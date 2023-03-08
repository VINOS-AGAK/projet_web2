<!-- <p>Page detail</p>
создать страницу товара (вино) с фотографией слева и описанием справа (название, год сбора урожая, формат, страна, описание, дата приобретения, цена, количество  ) для мобильного экрана (HTML, CSS) и потом адаптивная для большого экрана где должна занимать  весь экран -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Название товара</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head> 
  <body>
    <div class="product-container">
      <div class="product-image">
        <img src="{{ asset('img/vin2.png')}}" alt="Название товара" />
      </div>
      <div class="product-description">
        <h1>Название товара</h1>
        <ul>
          <li>Год сбора урожая: 2020</li>
          <li>Формат: 750 мл</li>
          <li>Страна: Италия</li>
          <li>Описание: Вкусное красное вино из солнечной Италии</li>
          <li>Дата приобретения: 1 марта 2023 г.</li>
          <li>Цена: $20</li>
          <li>Количество: 10</li>
        </ul>
      </div>
    </div>
  </body>
</html>
