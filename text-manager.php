<!DOCTYPE html>
<html>
<head>
    <title>Text manager</title>
    <link rel="stylesheet" href="https://unpkg.com/mustard-ui@latest/dist/css/mustard-ui.min.css">

</head>
<body>

<header style="height: 200px;">
    <h1>Text manager</h1>
</header>
<br>
<div class="row">
    <div class="col col-sm-5">
        <div class="panel">
            <div class="panel-body">
                <form action="text-manager.php" method="post">
                    <h2>1. Get text</h2>
                    <div class="form-control">
                        <input type="text" placeholder="Enter the poem url">
                    </div>
                    <button class="btn-prinamry"></button>
                    <h2>2. Find keywords</h2>
                    <div class="form-control">
                        <input type="text" placeholder="Enter text to be highlighted">
                    </div>



                </form>
            </div>
        </div>
    </div>

    <div class="col col-sm-7" style="padding-left: 25px;">
        <pre><code>
            TODO
        </code></pre>
    </div>
</div>

</body>
</html>