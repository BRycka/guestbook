{* Smarty *}
<h2>Login form</h2>
<form action="{$SCRIPT_NAME}?action=log" method="post">
    Name <input type="text" name="Name" value="{$post.Name|escape}"><br>
    Password <input type="password" name="Password" value="{$post.Name|escape}"><br>
    <input type="submit" value="Login">
</form>
