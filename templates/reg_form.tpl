{* Smarty *}
<h2>Registration form</h2>
<form action="{$SCRIPT_NAME}?action=reg" method="post">
    Name <input type="text" name="Name" value="{$post.Name|escape}"><br>
    Last Name <input type="text" name="LastName" value="{$post.Name|escape}"><br>
    Email <input type="email" name="Email" value="{$post.Name|escape}"><br>
    Password <input type="password" name="Password" value="{$post.Name|escape}"><br>
    <input type="submit" value="Register">
</form>
