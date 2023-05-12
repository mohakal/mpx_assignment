<!doctype html>
<html lang="en">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MPX Technical Exercise</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="mpx.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <form id="myForm">
                <div class="mb-3">
                    <label class="form-label">Paragraph</label>
                    <textarea class="form-control" id="paragraph" rows="3" name="paragraph" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Replacement</label>
                    <input type="text" class="form-control" id="replacement" name="replacement" required/>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
            <span id="returnFromSubmit"></span>
        </div>
        <div class="col-md-12">

            <form id="myFormSearch">
                <div class="mb-3">
                    <label class="form-label">Keyword</label>
                    <input type="text" class="form-control" id="keyword" name="keyword" required/>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <br>
            <span id="searchResultMessage"></span>
            <table class="table resultTable">
                <thead>
                <tr>
                    <th scope="col">Original Text</th>
                    <th scope="col">After Replacement</th>
                </tr>
                </thead>
                <tbody id="result">
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="mpx.js"></script>
</body>
</html>

