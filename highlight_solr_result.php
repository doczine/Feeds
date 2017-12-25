<?php

require(__DIR__.'/init.php');

$q = '';
if(isset($_GET['q'])){
	$q = strip_tags(stripslashes($_GET['q']));
}


?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
        <meta charset="utf-8" />
        <title>Demonry Search: <?php echo $q; ?> </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="Large Document Library Search" name="description" />
        <meta content="demonry.com" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <link rel="shortcut icon" href="../../../favicon.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--#if GENERIC || CHROME-->
    <meta name="google" content="notranslate">
<!--#endif-->

<!--#if FIREFOX || MOZCENTRAL-->
<!--#include viewer-snippet-firefox-extension.html-->
<!--#endif-->
<!--#if CHROME-->

</head>

<form accept-charset="utf-8" method="get" action="highlight.php">
&nbsp;&nbsp;&nbsp;&nbsp;<input id="q" name="q" size="50" maxlength="255" style="height: 22px; width: 800px; font-size: 12px; margin-top: 5px;" value="" type="text">
<input name="searchsubmit" value="SEARCH" type="submit" style="height: 30px; width: 80px; margin: 0 0 0 0;">
</form>

<a href='http://demonry.com:8080/solr/techproducts/browse?q=<?php echo $q; ?>'> Try Solaritas: <?php echo $q; ?></a>

<?php

// create a client instance
$client = new Solarium\Client($config);


echo "<br>";
echo $q;
echo "<br>";
// get a select query instance
$query = $client->createSelect();
$query->setQuery($q);
$query->setStart(0)->setRows(50);

// get highlighting component and apply settings
// highlights are applied to three fields with a different markup for each field
// much more per-field settings are available, see the manual for all options
$hl = $query->getHighlighting();
$hl->getField('name')->setSimplePrefix('<b>')->setSimplePostfix('</b>');
$hl->getField('cat')->setSimplePrefix('<u>')->setSimplePostfix('</u>');
$hl->getField('features')->setSimplePrefix('<i>')->setSimplePostfix('</i>');

// this executes the query and returns the result
$resultset = $client->select($query);
$highlighting = $resultset->getHighlighting();
// display the total number of documents found by solr
echo 'NumFound: '.$resultset->getNumFound();

// show documents using the resultset iterator
foreach ($resultset as $document) {

    echo '<hr/><table>';

    // the documents are also iterable, to get all fields
    foreach ($document as $field => $value) {
        // this converts multivalue fields to a comma-separated string
        if (is_array($value)) {
            $value = implode(', ', $value);
        }
        

		//echo '<tr><th>' . $field . '</th><td>' . $value . '</td></tr>';


		if($field == "id"){
		echo '<tr><th>id</th><td>' . $value . '</td></tr>';
		echo "<tr><th>Viewer Page</th><td><a href='http://demonry.com/" . $value . ".html'>Open Document</a></td></tr>";
		}

		if($field == "author"){ 
		echo '<tr><th>author</th><td>' . $value . '</td></tr>';
		}

		if($field == "author_s"){ 
		echo '<tr><th>author_s</th><td>' . $value . '</td></tr>';
		}
		if($field == "title"){ 
		echo '<tr><th>title</th><td>' . $value . '</td></tr>';
		}
		if($field == "content_type"){ 
		echo '<tr><th>content_type</th><td>' . $value . '</td></tr>';
		}
		if($field == "_version_"){ 
		echo '<tr><th>_version_</th><td>' . $value . '</td></tr>';
		}
		if($field == "score"){ 
		echo '<tr><th>score</th><td>' . $value . '</td></tr>';
		}
		if($field == "subject"){ 
		echo '<tr><th>subject</th><td>' . $value . '</td></tr>';
		}
		if($field == "keywords"){ 
		echo '<tr><th>keywords</th><td>' . $value . '</td></tr>';
		}
		if($field == "last_modified"){ 
		echo '<tr><th>last_modified</th><td>' . $value . '</td></tr>';
		}
		if($field == "name"){ 
		echo '<tr><th>name</th><td>' . $value . '</td></tr>';
		}
		if($field == "manu"){ 
		echo '<tr><th>manu</th><td>' . $value . '</td></tr>';
		}
		if($field == "manu_id_s"){ 
		echo '<tr><th>manu_id_s</th><td>' . $value . '</td></tr>';
		}
		if($field == "cat"){ 
		echo '<tr><th>cat</th><td>' . $value . '</td></tr>';
		}
		if($field == "popularity"){ 
		echo '<tr><th>popularity</th><td>' . $value . '</td></tr>';
		}
		if($field == "links"){ 
                echo "<br>";
		echo "Links";
                echo "<br>";

		echo "<textarea style='width:768px;height:200px;'>";
		echo $value;
		echo "</textarea>";
		echo "<br>";
		}
		if($field == "content"){ 
                echo "<br>";
		echo "Full Text";
                echo "<br>";
		echo "<textarea style='width:768px;height:200px;'>";
		echo $value;
		echo "</textarea>";
		$str = $value;
		preg_match_all('/[\w-]+/u', $str, $matches, PREG_OFFSET_CAPTURE);
		$term = $q;
		$span = 4;
                echo "<br>";
		echo "Snippets";
                echo "<br>";

		echo "<textarea style='width:768px;height:200px;'>";
		for ($i=0, $n=count($matches[0]); $i<$n; ++$i) {
			$match = $matches[0][$i];
			if (strpos($term, $match[0]) === 0) {
				$start = $matches[0][max(0, $i-$span)][1];
				$end = $matches[0][min($n-1, $i+$span+1)][1];
				echo substr($str, $start, $end-$start).'
';
		    }
}
		echo "</textarea>";
                echo "<br>";
		}

    }


    echo '</table><br/><b>Highlighting results:</b><br/>';
/*
    // highlighting results can be fetched by document id (the field defined as uniquekey in this schema)
    $highlightedDoc = $highlighting->getResult($document->id);
    if ($highlightedDoc) {
        foreach ($highlightedDoc as $field => $highlight) {
            echo implode(' (...) ', $highlight) . '<br/>';
        }
    }
*/

}

htmlFooter();
