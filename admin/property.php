<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Page</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <?php include('../templates/admin_templates.php')?>
        <div class="property_body">
            <div class="action_btns">
                <button>Edit</button>
                <button>Visible</button>
                <button>Delete</button>
                <button><svg onclick ="history.back()"viewBox="0 0 24 24" class="return"xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.8 11.8L4 4l7.8 7.8L4 19.6l7.8-7.8zm0 0l7.8 7.8-7.8-7.8L19.6 4l-7.8 7.8z" stroke="black" 
                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></button>
            </div>
        </div>
    </section>
</body>
</html>