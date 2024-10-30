<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
</head>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f9fc;
            margin: 20px;
            color: #333;
        }

        header, footer {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #007BFF; /* Blue color */
            font-size: 3em;
            margin-bottom: 10px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #444;
            margin-top: 20px;
            font-size: 2em;
            text-decoration: underline;
        }

        .date {
            font-size: 1.2em;
            color: #666;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        th, td {
            padding: 15px;
            text-align: left;
            transition: background-color 0.3s ease;
        }

        th {
            background-color: #007BFF; /* Blue color */
            color: white;
            text-transform: uppercase;
            font-size: 1em;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0f7ff; /* Light blue on hover */
        }

        footer {
            font-size: 0.9em;
            color: #777;
            margin-top: 20px;
        }

        .highlight {
            color: #d9534f; /* Highlight color */
            font-weight: bold;
        }
    </style>
<body>

    <header>
        <h1>Laporan Inventaris</h1>
        <p>Tanggal: </p>
    </header>

    <main>
        <h2>Detail Laporan</h2> 
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Baju</td>
                    <td>1123</td>
                    <td>12-10-2024</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Celana</td>
                    <td>3412</td>
                    <td>13-10-2024</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Rok</td>
                    <td>3412</td>
                    <td>14-10-2024</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Hijab</td>
                    <td>651</td>
                    <td>14-10-2024</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Sepatu</td>
                    <td>7546</td>
                    <td>15-10-2024</td>
                </tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>v gf f</td>
                    <td>juuh</td>
                    <td>huhu</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>v gf f</td>
                    <td>juuh</td>
                    <td>huhu</td>
                </tr>
            </tbody>
        </table>
    </main>

    <footer>
        <p>© 2024 Inventaris SRC CIK IRAT. All rights reserved.</p>
    </footer>

</body>
</html>
