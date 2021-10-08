<?php 

function CreateConnectionObject()
{
    $fh = fopen('auth.txt','r');
    $Host =  trim(fgets($fh));
    $UserName = trim(fgets($fh));
    $Password = trim(fgets($fh));
    $Database = trim(fgets($fh));
    $Port = trim(fgets($fh)); 
    fclose($fh);
    $mysqlObj = new mysqli($Host, $UserName, $Password,$Database,$Port);
    // if the connection and authentication are successful, 
    // the error number is 0
    // connect_errno is a public attribute of the mysqli class.
    if ($mysqlObj->connect_errno != 0) 
    {
     echo "<p>Connection failed. Unable to open database $Database. Error: "
              . $mysqlObj->connect_error . "</p>";
     // stop executing the php script
     exit;
    }
    return ($mysqlObj);
}

function WriteHeaders($Heading="Welcome", $TitleBar="MySite")
{
    echo "
    <!doctype html>                  
    <html lang = \"en\">
    <head>
        <meta charset = \"UTF-8\">
        <title>$TitleBar</title>
        <link rel =\"stylesheet\" type = \"text/css\" href=\"ZooParameters.css\"/>
        <link rel=\"stylesheet\" href=\" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">
        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\">
    </head>
    <body>\n     
    <h1>$Heading - Gianluca Venditti </h1>
    ";
}

function DisplayLabel($prompt)
{
    echo "<label>" . $prompt . "</label>";
}

function DisplayTextBox($Name, $Size, $value=0)
{
    echo " <Input type = text name = \"$Name\" Size = \"$Size\" value = \"$value\">";
}

function DisplayContactInfo()
{
    echo "<footer>Questions? Comments?
    <a href = \"mailto:gianluca.venditti@student.sl.on.ca\">gianluca.venditti@student.sl.on.ca
    </a></footer>";
}

function DisplayImage($Filename, $Alt, $Width, $Height)
{
    echo" <img src=\"$Filename\" alt=\"$Alt\" width=\"$Width\" height=\"$Height\">";
}

function DisplayButton($Name, $Text, $Filename = "", $Alt = "")
{   
   if ($Filename != "") // 
   {
        echo"<button type=Submit name = \"$Name\">";
        DisplayImage("$Filename", "$Alt", 30,40); // add transparent imgaes 
        echo "</button>";
   }
   else //otherwise display a normal button
   {
    echo "<button type=Submit name = \"$Name\">$Text</button>"; 
   }  
}

function WriteFooters()
{
    DisplayContactInfo();
    echo "</body>\n";
    echo "</html>\n";
}



function WriteFootersAdvanced()
{
    echo "
        <div class=\"content-box\">
                <div class=\"container\">
                    <h1>Questions & Comments</h1>
                    <div class=\"row\">
                        <div class=\"col-md-6 contact-info\">
                            <div class=\"follow\">
                                <i class=\"fa fa-address-card-o\"></i><span>Gianluca Venditti</span>
                            </div>
                            <div class=\"follow\">
                                <i class=\"fa fa-map-marker\"></i><span> Kingston Ontario, ON</span>
                            </div>
                            <div class=\"follow\">
                                <i class=\"fa fa-phone\"></i><span><a href=\"tel:(613)561-7885\" data-type=\"phone\">(613) 449-12-53</a></span>
                            </div>
                            <div class=\"follow\">
                                <i class=\"fa fa-envelope\"></i><span><a href=\"mailto:Gianluca.Venditti@student.sl.on.ca\" data-type=\"email\">Gianluca.Venditti@student.sl.on.ca</a></span>
                            </div>
                            <div class=\"follow\">
                                <i class=\"fa fa-facebook\"></i>
                                <i class=\"fa fa-youtube\"></i>
                                <i class=\"fa fa-twitter\"></i>
                                <i class=\"fa fa-instagram\"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    ";
}
?>