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
        <div v-for="item in items">@{{ item }}</div>
      </div>

      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue"></script>
      <script src="/js/dashboard_test.js"></script>
    </body>
</html>
