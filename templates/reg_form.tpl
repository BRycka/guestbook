{* Smarty *}
{if $error ne ""}
    <table>
        <tr>
            <td bgcolor="yellow" colspan="2">
                {if $error eq "name_empty"}You must supply a name.
                {elseif $error eq "last_name_empty"} You must supply a Last name.
                {elseif $error eq "email_empty"} You must supply your Email.
                {elseif $error eq "password_empty"} You must supply your Password.
                {elseif $error eq "email_exist"} User with this Email already exists.
                {/if}
            </td>
        </tr>
    </table>
{/if}
<h2>Registration form</h2>
<form action="{$SCRIPT_NAME}?action=regSubmit" method="post">
    Name <input type="text" name="Name" value="{$post.Name|escape}"><br>
    Last Name <input type="text" name="LastName" value="{$post.LastName|escape}"><br>
    Email <input type="email" name="Email" value="{$post.Email|escape}"><br>
    Password <input type="password" name="Password"><br>
    <input type="submit" value="Register">
</form>
