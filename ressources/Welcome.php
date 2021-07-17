<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="ressources\css\index.css" >
    </head>
    <body>

        <div id="container">
            <div>
                <h1>Welcome</h1>
                <form action="form" method="POST">

                    <input type="test" name="person[0][pseudo]" id="pseudo" placeholder="Pseudo"></br></br>
                    <input type="password" name="password" id="password" placeholder="password"></br></br>
                    <input type="submit" name="valider" value="Valider">

                </form>
            </div>

        </div>
        
    </body>
</html>