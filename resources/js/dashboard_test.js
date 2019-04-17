new Vue({
  el: '#app',
  data: {
    items: []
  },
  methods: {
    loadData: function () {
      $.get('/get_last_names', function (response) {
        this.items = response.items;
        console.log(response.items);
      }.bind(this));
    }
  },
  ready: function () {
    this.loadData();

    setInterval(function () {
      // this.loadData();
      alert('loading data...');
    }.bind(this), 30000);
  }
});
