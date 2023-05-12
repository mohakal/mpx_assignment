<?php

class database
{
    private string $servername = "localhost";
    private string $username = "root";
    private string $password = "fahim";
    private string $dbname = "mpx";

    private ?mysqli $conn;

    function __construct()
    {   try{
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            $this->conn = null;
        } else {
            $this->conn = $conn;
        }
    } catch (\Exception $e){
        $this->conn = null;
    }

    }

    public function saveDataInDb($paragraph, $replacement, $replacedPhrases, $afterReplacement)
    {
        if ($this->conn) {
            $stmt = $this->conn->prepare("INSERT INTO data (paragraph, replacement, replaced_phrases,after_replacement) VALUES (?, ?, ?,?)");
            $stmt->bind_param("ssss", $paragraph, $replacement, $replacedPhrases, $afterReplacement);
            if (!$stmt->execute()) {
                $this->conn->close();
                return false;
            }
            $this->conn->close();
            return true;
        }
        return false;
    }

    public function searchFromDB($keyword)
    {
        $result["status"] = "100";
        $result["message"] = "DB Error";
        if ($this->conn) {
            $stmt = $this->conn->prepare("SELECT paragraph,after_replacement FROM  data WHERE replaced_phrases LIKE ?");
            $keyword = "%" . $keyword . "%";
            $stmt->bind_param("s", $keyword);
            if (!$stmt->execute()) {
                $this->conn->close();
                return $result;
            }
            $stmt->store_result();
            if($stmt->num_rows>0) {
                $result["status"] = "200";
                $stmt->bind_result($paragraph, $afterReplacement);

                /* fetch values */
                while ($stmt->fetch()) {
                    $rows[] = [$paragraph, $afterReplacement];

                }
                $result["message"] = $rows;
                $this->conn->close();
            } else {
                $result["status"] = "203";
                $result["message"] = "No Records Found";
            }
        }
        return $result;
    }


}