{* Smarty *}
{if $error ne ""}
    <table>
        <tr>
            <td bgcolor="yellow" colspan="2">
                {if $error eq "name_empty"}You must supply a name.
                {elseif $error eq "password_empty"} You must supply a password.
                {/if}
            </td>
        </tr>
    </table>
{/if}
<h2>Login form</h2>
<form action="{$SCRIPT_NAME}?action=loginSubmit" method="post">
    Name <input type="text" name="Name" value="{$post.Name|escape}"><br>
    Password <input type="password" name="Password" value="{$post.Name|escape}"><br>
    <input type="submit" value="Login">
</form>
