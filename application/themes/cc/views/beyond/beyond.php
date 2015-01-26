<?php if($is_admin): ?>
<h1>
	beyond  everything
</h1>
<p>
    <a href="#" id="disconnect" >déconnexion</a>
</p>
<?php else: ?>
<form id="beyond-connect" class="form" role="form">
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-success">Connexion</button>
</form>
<?php endif; ?>