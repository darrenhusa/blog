<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard Test</title>

    </head>
    <body>
      <h1>Dashboard Test</h1>

      <div id="app">
        <ol>
          <li v-for="item in items">@{{ item }}</li>
        </ol>
      </div>

      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
      <script
  src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  </script>
      <script src="/js/dashboard_test.js"></script>
    </body>
</html>
