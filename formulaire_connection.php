<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap-theme.min.css">
<script src="/jquery/jquery-1.10.2.min.js"></script>
<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Connexion</div>
                <div class="panel-body">
                    <form id='f1' method='post' action="connection.php" target="_parent"></br>
                    	<fieldset>
                            <div class="input-group"><span class="input-group-addon">Login</span> <input type='text' class="form-control" name='log' required></div></br>
        					<div class="input-group"><span class="input-group-addon">Mot de passe</span> <input type='password' class="form-control" name='pwd' required></div></br>
                            <center><input type="submit" class="btn btn-default" value="Se connecter" ></center>
                    	</fieldset>
                    </form>
                </div>
            </div>
        </div>