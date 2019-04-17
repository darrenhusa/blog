new Vue({
  el: '#app',
  data: {
    items: []
  },
  methods: {
    loadData: function () {
      // console.log('inside loadData');

      // $.get('/get_last_names', function (response) {
      //   this.items = response.items;
      //   console.log(response.items);
      // }.bind(this));

      axios.get('/get_last_names').then(response => this.items = response.data);
    }
  },
  created: function () {
    this.loadData();

    setInterval(function () {
      console.log('running setInterval');

      this.loadData();
      // alert('loading data...');
    }.bind(this), 30000);
  }
});
