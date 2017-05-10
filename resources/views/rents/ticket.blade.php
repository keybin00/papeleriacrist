<html>
<head>
<title>Invoice</title>
<style type="text/css">
  #page-wrap {
    width: 700px;
    margin: 0 auto;
  }
  .center-justified {
    text-align: justify;
    margin: 0 auto;
    width: 30em;
  }
  table.outline-table {
    border: 1px solid;
    border-spacing: 0;
  }
  tr.border-bottom td, td.border-bottom {
    border-bottom: 1px solid;
  }
  tr.border-top td, td.border-top {
    border-top: 1px solid;
  }
  tr.border-right td, td.border-right {
    border-right: 1px solid;
  }
  tr.border-right td:last-child {
    border-right: 0px;
  }
  tr.center td, td.center {
    text-align: center;
    vertical-align: text-top;
  }
  td.pad-left {
    padding-left: 5px;
  }
  tr.right-center td, td.right-center {
    text-align: right;
    padding-right: 50px;
  }
  tr.right td, td.right {
    text-align: right;
  }
  .grey {
    background:grey;
  }
</style>
</head>
<body>
  <div id="page-wrap">
    <table width="100%">
      <tbody>
        <tr>
          <td width="30%">
            <img src="<?=public_path();?>/images/template/img/pcriss.jpg" class="user-image" alt="User Image" style="height: 200px!important;width: 200px!important;">
          </td>
          <td width="70%">
            <h2>Recibo de Renta</h2><br>
            <strong>Fecha:</strong> <?php echo date('d/M/Y');?><br>
            <strong>Recibo Número:</strong> <?=$rent->id?><br>
            <?php $date=date_create($rent->created_at); ?>
            <strong>Fecha del Servicio:</strong> <?php echo date_format($date,"Y-m-d H:i:s") ?><br>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="center-justified">
              <strong>Recibo Para:</strong> Cliente
              <strong>Total:</strong> <?php setlocale(LC_MONETARY, 'en_US'); echo '$'.money_format('%(#10n', $totalCharge).' M.N.' ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <table width="100%" class="outline-table">
      <tbody>
        <tr class="border-bottom border-right grey">
          <td colspan="3"><strong>Conceptos</strong></td>
        </tr>
        <tr class="border-bottom border-right center">
          <td width="45%"><strong>Servicio</strong></td>
          <td width="25%"><strong>Impuestos</strong></td>
          <td width="30%"><strong>Total (IVA)</strong></td>
        </tr>
        <tr class="border-right">
          <td class="pad-left">Renta de Equipo por: <?=$timetotal?></td>
          <td class="center">Impuesto (16%)</td>
          <td class="right-center"><?php setlocale(LC_MONETARY, 'en_US'); echo '$'.money_format('%(#10n', $totalCharge*0.16).' M.N.' ?></td>
        </tr>
        <tr class="border-right">
          <td class="pad-left">&nbsp;</td>
          <td class="right border-top">Subtotal</td>
          <td class="right border-top"><?php setlocale(LC_MONETARY, 'en_US'); echo '$'.money_format('%(#10n', $totalCharge).' M.N.' ?></td>
        </tr>
        <tr class="border-right">
          <td class="pad-left">&nbsp;</td>
          <td class="right border-top">Total</td>
          <td class="right border-top"><?php setlocale(LC_MONETARY, 'en_US'); echo '$'.money_format('%(#10n', ($totalCharge + ($totalCharge * 0.16))).' M.N.' ?></td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
<!--     <table width="100%" class="outline-table">
      <tbody>
        <tr class="border-bottom border-right grey">
          <td colspan="3"><strong>Usage Line Item 1</strong></td>
        </tr>
        <tr class="border-bottom border-right center">
          <td width="45%"><strong>Description</strong></td>
          <td width="25%"><strong>Date</strong></td>
          <td width="30%"><strong>Amount (INR)</strong></td>
        </tr>
        
        <tr class="border-right">
          <td class="pad-left">Line item 1.1 desc</td>
          <td class="center">Usage date</td>
          <td class="right-center">Amount</td>
        </tr>
        
      </tbody>
    </table> -->
    <p>&nbsp;</p>
    <table width="100%">
      <tbody>
        <tr>
          <td width="50%">
            <div class="center-justified"><strong>Opciones de Pago:</strong><br>
              Efectivo<br>
              <!-- <strong>ST Reg no:</strong> Your service tax number<br> -->
              <strong>Categoría:</strong> Renta<br>
              <!-- <strong>Service category code:</strong> Service tax code<br> -->
            </div>
          </td>
          <td width="50%">
            <div class="center-justified">
            <strong>Dirección</strong><br>
            Av. Lopez Portillo<br>
            #356<br>
            Cancún QRoo<br>
          </td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>

  </div>
</body>
</html>