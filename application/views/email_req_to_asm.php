<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>

    <style type="text/css">

        * { margin: 0; padding: 0; font-size: 100%; font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; line-height: 1.65; }

        img { max-width: 100%; margin: 0 auto; display: block; }

        body, .body-wrap { width: 100% !important; height: 100%; background: #f8f8f8; }

        a { color: #71bc37; text-decoration: none; }

        a:hover { text-decoration: underline; }

        .text-center { text-align: center; }

        .text-right { text-align: right; }

        .text-left { text-align: left; }

        .button { display: inline-block; color: white; background: #71bc37; border: solid #71bc37; border-width: 10px 20px 8px; font-weight: bold; border-radius: 4px; }

        .button:hover { text-decoration: none; }

        .link { display: inline-block; color: white; background: #71bc37; border: solid #71bc37; border-width: 10px 20px 8px; font-weight: bold; border-radius: 4px; }

        .link:hover { text-decoration: none; }

        h1, h2, h3, h4, h5, h6 { margin-bottom: 20px; line-height: 1.25; }

        h1 { font-size: 32px; }

        h2 { font-size: 28px; }

        h3 { font-size: 24px; }

        h4 { font-size: 20px; }

        h5 { font-size: 16px; }

        p, ul, ol { font-size: 16px; font-weight: normal; margin-bottom: 20px; }

        .container { display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important; }

        .container table { width: 100% !important; border-collapse: collapse; }

        .container .masthead { padding: 80px 0; background: #71bc37; color: white; }

        .container .masthead h1 { margin: 0 auto !important; max-width: 90%; text-transform: uppercase; }

        .container .content { background: white; padding: 30px 35px; }

        .container .content.footer { background: none; }

        .container .content.footer p { margin-bottom: 0; color: #888; text-align: center; font-size: 14px; }

        .container .content.footer a { color: #888; text-decoration: none; font-weight: bold; }

        .container .content.footer a:hover { text-decoration: underline; }


    </style>
</head>
<body>
    <?php 
    $koneksi = mysqli_connect("localhost","root","","newkmi");
    $noticketlast = mysqli_query($koneksi,"SELECT noticket AS 'hasil' FROM form ORDER BY noticket DESC LIMIT 1");
    $convertnoticket = mysqli_fetch_assoc($noticketlast);

    $email = $this->session->userdata('email');
    $temp = $this->m_data->get_jabatan_sekarang($email)->result();
    $id_jabatan_sekarang = $temp[0]->id_jabatan;
    $departemen_sekarang = $temp[0]->Departemen;

    if($id_jabatan_sekarang < 3){
        $id_jabatan_sekarang += 1;

        $result = $this->m_data->get_higher_jabatan($id_jabatan_sekarang,$departemen_sekarang)->result();

        $jabatan_atasan = $result[0]->Jabatan;
        $email_atasan = $result[0]->email;
        $departemen_atasan = $result[0]->Departemen;

    } else {
        echo "Jabatan Tertinggi";
    }

    ?>
    <table class="body-wrap">
        <tr>
            <td class="container">

                <!-- Message start -->
                <table>
                    <tr>
                        <td align="center" class="masthead">

                            <h1>Kawasaki Requisition Form System</h1>

                        </td>
                    </tr>
                    <tr>
                        <td class="content">

                            <center><h2>Hi <?php echo $email_atasan ?></h2></center>

                            <center><p>You need to approve this new submitted form</p>
                            <p>ticket number <?php echo $printcn = $convertnoticket['hasil'] ?></p></center>

                            <table>
                                <tr>
                                    <td align="center">
                                        <p>
                                            <a href="http://localhost/kmi/" class="link">APPROVE NOW</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr>
            <td class="container">

                <!-- Message start -->
                <table>
                    <tr>
                        <td class="content footer" align="center">
                            <p>Sent by <a href="http://localhost/kmi/">KawasakiRFS</a></p>
                            <p><a href="https://kawasaki-motor.co.id">PT. Kawasaki Motor Indonesia</a></p>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>
</html>