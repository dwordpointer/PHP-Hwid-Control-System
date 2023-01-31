<?php
include 'include/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>C# & PHP OOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
  body {
    background-color: #545454;
    color: white;
  }
  
</style>
<?php
$kontrol = new variable();
$records = [];
$records = $kontrol->get();
?>

<body><br><br>
  <div class="w-25 mx-auto">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
      <div class="mb-3">
        <label for="exampleInputtext" class="form-label">Hwid Numarası</label>
        <input type="text" name="hwid" class="form-control" id="exampleInputtext">
      </div>
      <div class="mb-3">
        <label for="exampleInputtext1" class="form-label">Gün Sayısı</label>
        <input type="text" name="date" class="form-control" id="exampleInputtext1">
      </div>
      <div class="mb-3">
        <label for="exampleInputtext1" class="form-label">Ad Soyad</label>
        <input type="text" name="name" class="form-control" id="exampleInputtext1">
      </div>
      <div class="mb-3">
        <label for="exampleInputtext1" class="form-label">Telefon</label>
        <input type="text" name="number" class="form-control" id="exampleInputtext1">
      </div>
      <input type="submit" class="btn btn-secondary" value="Kaydet">
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $kontrol->set($_POST["hwid"],$_POST["date"],$_POST["name"],$_POST["number"]);
      header("Location: index.php");
    }
    ?>

  </div>
  <br><br>
  <div class="w-50 mx-auto">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Hwid</th>
          <th scope="col">Durum</th>
          <th scope="col">Süre</th>
          <th scope="col">Ad Soyad</th>
          <th scope="col">Telefon</th>
          <th scope="col">Sil</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($records as $record) {
        ?>
          <tr>
            <th><?= $record->id ?></th>
            <td><?= $record->hwid ?></td>
            <td><?= $record->durum ?></td>
            <td><?= $record->kalan ?></td>
            <td><?= $record->musteri_ad_soyad ?></td>
            <td><?= $record->musteri_telefon ?></td>
            <td><a href="index.php?deleteId=<?= $record->id ?>"><img src='img/trash.png' style='width:25px;'></img></a></td>
          </tr>
        <?php
        }
        if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
          $deleteId = $_GET['deleteId'];
          $kontrol->delete($deleteID);
      }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>