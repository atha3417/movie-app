<?php 

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://www.omdbapi.com', [
	'query' => [
		'apikey' => '32e98d72',
		's' => 'transformers'
	]
]);

$result = json_decode($response->getBody()->getContents(), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Movie</title>
</head>
<body>
	<?php foreach ($result['Search'] as $movie): ?>
		<ul>
			<li>Title : <?= $movie['Title']; ?></li>
			<li>Year : <?= $movie['Year']; ?></li>
			<li>
				<img src="<?= $movie['Poster']; ?>" width="100">
			</li>
		</ul>
	<?php endforeach ?>
</body>
</html>