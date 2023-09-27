<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $has_filters = !empty($_GET);

    if($has_filters){
      $filters = $_GET;

      if(isset($filters['parking'])){
        $temp_hotels = [];
        foreach ($hotels as $hotel){
          if((bool)$filters['parking'] === $hotel['parking']){
            $temp_hotels[] = $hotel;
          }
        }

        $hotels = $temp_hotels;
      }
    }
    
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

</head>

<body>
  <div class="container mt-5" >
  <div class="card mb-3">
    <div class="card-header">
      <h2>Filtri</h2>
    </div>
  <div class="card-body">
    <form method="GET">
      <select name="parking" id="parking" required class="form-select mb-3 " >
        <option value="">Seleziona un filtro</option>
        <option value="1">Con parcheggio</option>
        <option value="0">Senza parcheggio</option>
        <option value="both">both</option>
      </select>
      <button class="btn btn-primary" >Filtra</button>
      <input type="reset" class="btn btn-secondary" >
    </form>
  <table class="table">
    <div class="card-header">
      <h3> Hotel List</h3>
    </div>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrizione</th>
      <th scope="col">Parcheggio</th>
      <th scope="col">Voto</th>
      <th scope="col">Distanza</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($hotels as $index => $hotel): ?>

      <tr>
        <th scope="row">
        <?php echo $index + 1 ?>
        </th>
        <td> <?php echo $hotel['name'] ?></td>
        <td><?php echo $hotel['description'] ?></td>
        <td><?php echo $hotel['parking'] ? 'si':'no' ?></td>
        <td><?php echo $hotel['vote'] ?></td>
        <td><?php echo $hotel['distance_to_center'] ?></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
  </div>
</div>
  </div>
</body>
</html>