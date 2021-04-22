<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Algo</title>
</head>
<body>
    <div id="penjualanchart" style="height: 300px;"></div>
    <div id="kategorichart" style="height: 300px;"></div>
    
    <table border="1" width="100%">
        <thead>
            <tr>
                <td>No ID Penjualan</td>
                <td>Nama Customer</td>
                <td>Alamat</td>
                <td>Tanggal Penjualan</td>
                <td>Total Penjualan</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($penjualan as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->konsumen->nama_konsumen }}</td>
                <td>{{ $p->konsumen->alamat }}</td>
                <td>{{ $p->tanggal_penjualan }}</td>
                <td>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($p->detail_penjualan as $t)
                        @php
                            $total += $t->harga_total;
                        @endphp
                    @endforeach
                    {{ $total }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      const penjualanchart = new Chartisan({
        el: '#penjualanchart',
        url: "@chart('penjualan_chart')",
        hooks: new ChartisanHooks()
            .title('Penjualan tiap hari')
      });

      const kategorichart = new Chartisan({
        el: '#kategorichart',
        url: "@chart('kategori_chart')",
        hooks: new ChartisanHooks()
            .legend()
            .datasets(['pie'])
            .title('Persentase Kategori Barang')
            .custom(({ data }) => ({
            ...data,
            series: data.series.map((serie) => ({
                ...serie,
                label: { show: false },
            })),
        }))
      });
    </script>
</body>
</html>