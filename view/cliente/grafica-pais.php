<?php  if ($this->model->ListarNumClPais()) {?>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php foreach ($this->model->ListarNumClPais() as $p) { ?>
                ['<?php print $p->pais ?>',  <?php print $p->cantidad ?> ],
            <?php } ?>
        ]);

        var options = {
            title: 'Registro de Clientes por País'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechartPais'));

        chart.draw(data, options);
        }
</script>   
<div id="piechartPais"></div>
<?php } ?>