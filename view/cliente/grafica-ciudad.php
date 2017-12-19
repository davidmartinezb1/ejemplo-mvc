<?php  if ($this->model->ListarNumClCiudad()) {?>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php foreach ($this->model->ListarNumClCiudad() as $c) { ?>
                ['<?php print $c->ciudad ?>',  <?php print $c->cantidad ?> ],
            <?php } ?>
        ]);

        var options = {
            title: 'Registro de Clientes por Ciudad'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }
</script>
<div id="piechart"></div>
<?php } ?>