<?php  if ($this->model->ListarNumClDpto()) {?>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php foreach ($this->model->ListarNumClDpto() as $c) { ?>
                ['<?php print $c->departamento ?>',  <?php print $c->cantidad ?> ],
            <?php } ?>
        ]);

        var options = {
            title: 'Registro de Clientes por Departamentos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechartDpto'));

        chart.draw(data, options);
        }
</script>
<div id="piechartDpto"></div>
<?php } ?>