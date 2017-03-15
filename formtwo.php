<?php
/**
 * Created by PhpStorm.
 * User: uditr
 * Date: 2017-03-14
 * Time: 8:43 PM
 */

$missing = [];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $values = ['name','email','comments'];

    if(isset($_POST['send']))
    {
        foreach($values as $elements)
        {
            if(trim($_POST[$elements]) == false)
            {
                $missing[] = $elements;
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <style>
            .warning{
                color:red;
            }
            textarea{
                height:20em;
                width:40em;
            }
        </style>
    </head>
    <style>

    </style>
    <body>
        <h1 id="contact">Contact Us</h1>
        <label for="contact">
            <?php if($missing) : ?>
                <span class="warning">Please correct the below errors</span>
            <?php endif; ?>
        </label>

        <form name="contactForm" id="contactForm" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
            <label for="name">Name:
                <?php if($missing && in_array('name',$missing)) : ?>
                    <span class="warning">Please enter the name</span>
                <?php endif; ?>
            </label>
            <p>
                <input type="text" name="name" id="name" />
            </p>

            <label for="email">Email:
                <?php if($missing && in_array('email',$missing)) : ?>
                    <span class="warning">Please enter the email</span>
                <?php endif; ?>
            </label>
            <p>
                <input type="text" name="email" id="email" />
            </p>

            <label for="comments">Comments:
                <?php if($missing && in_array('comments',$missing)) : ?>
                    <span class="warning">Please enter the comments</span>
                <?php endif; ?>
            </label>
            <p>
                <textarea type="text" name="comments" id="comments" ></textarea>
            </p>

            <p>
                <input type="submit" name="send" id="send" value="Send Comments" />
            </p>
        </form>
    </body>
</html>
