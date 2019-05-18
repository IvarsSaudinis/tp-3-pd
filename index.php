<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<title>3. pārbaudes darbs</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-widthinitial-scale=1">
	<meta name="theme-color" content="#fafafa">
	<style>
		body {
			width: 1000px;
			margin:10px auto;
		}
		input {
			width: 300px;
		}
		.browserupgrade
		{
			color:red;
		}
	</style>
</head>

<body>
<!--[if IE]>
<p class="browserupgrade">Vecs pārlūks :(</p>
<![endif]-->
<?php
if (empty($_POST))
{
	?>
	<p>Ievadiet tekstuko nepieciešams pārkodēt.</p>
	<form action="/" method="post" name="forma">
		<input name="text" placeholder="ievadiet kodējamo tekstu">
		<button type="submit">Kodēt!</button>
	</form>
<?php } else
{
	$alfabets = [
		"A","Ā","B","C","Č","D",
		"E","Ē","F","G","H","I",
		"Ī","J","K","Ķ","L","Ļ",
		"M","N","Ņ","O","P","R",
		"S","Š","T","U","Ū","V",
		"Z","Ž"
	];

	$vards = strtoupper($_POST['text']);
	echo "Orģinālvārds:<strong>" . $vards . "</strong><br/>";
	echo "Pārkodētais: <br/>";

	echo "ar <i>rekursīvu</i> funkciju: ";
	function recoode($vards, $it, $al)
    {
        if(empty($vards[$it]))
        {
            return;
        }
	    switch ($vards[$it])
	    {
		    case "Z": echo "A"; break;
		    case "Ž": echo "Ā"; break;
		    default:
			    echo $al[array_search($vards[$it], $al)+2];
	    }
        $it++;
        recoode($vards, $it, $al);
    }

    recoode($vards, 0, $alfabets);

	echo "<br/>";
	//--------------------------------------
    echo "ar <i>for</i> ciklu: ";
	for ($a = 0; $a< strlen($vards); $a++)
	{
		switch ($vards[$a])
		{
			case "Z": echo "A"; break;
			case "Ž": echo "Ā"; break;
			default:
				echo $alfabets[array_search($vards[$a], $alfabets)+2];
		}
	}
	echo "<br/>";
    //--------------------------------------
	echo "ar <i>while</i> ciklu: ";
	$a =0;
	while(!empty($vards[$a]))
    {
	    switch ($vards[$a])
	    {
		    case "Z": echo "A"; break;
		    case "Ž": echo "Ā"; break;
		    default:
			    echo $alfabets[array_search($vards[$a], $alfabets)+2];
	    }
	    $a++;
    }

	echo "<br/>";
    //--------------------------------------
	echo "ar <i>foreach</i> ciklu: ";
	foreach (str_split($vards) as $simbols) {
	  switch ( $simbols ) {
			case "Z":echo "A";break;
			case "Ž":echo "Ā";break;
			default:
				echo $alfabets[ array_search( $simbols, $alfabets ) + 2 ];
		}
	}


	echo "<br/>";
    echo "<button onclick='window.history.back()'>Atpakaļ</button>";
}
?>
</body>
</html>
