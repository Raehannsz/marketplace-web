<div class="container">
	<h5 class="fs-4 fw-bold">Selamat Datang Admin Hansz Shop</h5>
	<p class="lead mb-4">
		Melalui panel ini Anda dapat mengelola kategori produk dan transaksi yang terjadi di marketplace
	</p>

	<div id="grafik_member_distrik"></div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
	Highcharts.chart('grafik_member_distrik', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Jumlah Member Berdasarkan Distrik'
    },
    tooltip: {
        valueSuffix: 'orang'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Jumlah',
            colorByPoint: true,
            data: [
                <?php foreach ($jumlah_member_distrik as $key => $value): ?>

				{
					name: '<?php echo $value['nama_distrik_member'] ?>',
                    y: <?php echo $value['jumlah'] ?>,
                },
				<?php endforeach ?>
            ]
        }
    ]
});
</script>