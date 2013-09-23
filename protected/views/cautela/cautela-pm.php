<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    
    <title>Cautela <?php echo $model->id; ?></title>
</head>
<body>
<?php $user = Yii::app()->getModule('user')->user()->profile; $ano = date('Y'); ?>
<center>
<table width="900" >
	<tr>
		<td colspan="4" style="text-align: center; font-size:large; font-weight: bold; padding: 2px;">TERMO DE RESPONSABILIDADE</td>
		<td style="text-align: left; font-size: medium; font-weight: bold;">Nº. <?php echo $model->id.'/'.$ano; ?></td>
		<td>Data: <?php echo $data = Yii::app()->dateFormatter->formatDateTime($model->data,'medium',null); ?></td>
	</tr>
	<tr>
		<td colspan="6" style="padding: 5px; margin: 0px;"><p style="margin: 2px;"><b><?php echo $model->servidor->nome.', '.$model->servidor->cargo.', Mat. '.$model->servidor->matricula; ?></b>, 
		declaro pelo presente documento que recebi do(a) Sr(a). <b><?php echo strtoupper($user->firstname.' '.$user->lastname); ?></b> o material abaixo especificado, 
		que ficará sob minha guarda, assumindo total responsabilidade pela manutenção do referido material, que se encontra  em perfeito estado de conservação e funcionamento, 
		comprometendo-me a ressarcir o Estado em caso de dano, roubo ou extravio, nas suas formas simples ou qualificadas, ou qualquer outra forma de extravio, por dolo ou culpa, 
		além da responsabilidade administrativa disciplinar e penal que o caso possa requerer. Autorizo, de forma irrevogável, a Polícia Militar do Amazonas a debitar em minha 
		folha de pagamento o valor correspondente ao do material, em parcelas, conforme o previsto nas normas sobre processo administrativo da Polícia Militar, no caso de 
		ressarcimento pelos motivos citados anteriormente.</p></td>
	</tr>
</table>
<?php if ($model->arma !== null) { ?>
<table width="900">
	<tr>
		<th>ESPECIFICAÇÃO</th>
		<th>Nº. SÉRIE</th>
		<th>PATRIMÔNIO</th>
		<th>SIGMA</th>
		<th>OBS/ESTADO</th>
	</tr>
	<tr>
		<td><?php echo $model->arma->tipo->tipoText; ?></td>
		<td><?php echo $model->arma->num_serie; ?></td>
		<td><?php echo $model->arma->patrimonio; ?></td>
		<td><?php echo $model->arma->sigma; ?></td>
		<td><?php echo $model->estado; ?></td>
	</tr>
	<?php if($model->qtde_carregador!==null) { ?>
	<tr>
		<td colspan="5"><?php			
				if($model->qtde_carregador>1)
					echo "Acompanha {$model->qtde_carregador} Carregadores.";
				else
					echo "Acompanha {$model->qtde_carregador} Carregador.";
		?></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>
<?php if ($model->municao !== null) { ?>
<table width="900">
	<tr>
		<th>MUNIÇÃO</th>
		<th>LOTE</th>
		<th>QUANTIDADE</th>
	</tr>
	<tr>
		<td><?php echo $model->municao->tipo->TipoText; ?></td>
		<td><?php echo $model->municao->lote; ?></td>
		<td><?php echo $model->qtde_municao; ?></td>
	</tr>
</table>
<?php } ?>
<table width="900">
	<tr>
		<td colspan="3">Entregue por</td>
		<td>Recebido por</td>
	</tr>
	<tr>
		<td colspan="3">Manaus, AM _____/_____/__________. </td>
		<td>Manaus, AM _____/_____/__________. </td>
	</tr>
	<tr>
		<td colspan="3">1ª.Testemunha:</td>
		<td>2ª.Testemunha:</td>
	</tr>
</table>
</center>
</body>
</html>
