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
		<td colspan="4" style="text-align: center; font-size:x-large; font-weight: bold;">TERMO DE RESPONSABILIDADE</td>
		<td style="text-align: left; font-size: medium; font-weight: bold;">Nº. <?php echo $model->id.'/'.$ano; ?></td>
		<td>Data: <?php echo $data = Yii::app()->dateFormatter->formatDateTime($model->data,'medium',null); ?></td>
	</tr>
	<tr>
		<td colspan="6" style="padding: 5px;"><p><b><?php echo $model->servidor->nome.', '.$model->servidor->cargo.', Mat. '.$model->servidor->matricula; ?></b>, 
		declaro pelo presente documento que recebi do(a) Sr(a). <b><?php echo strtoupper($user->firstname.' '.$user->lastname); ?></b> o material abaixo especificado, 
		que ficará sob minha responsabilidade. Em caso de extravio ou perda, 
		pagarei o valor estabelecido pelo Departamento de Administração 
		e sujeito às penas administrativas das leis nº. 2.271/94 e nº. 1.762/86, 
		sem prejuízo das sanções penais correspondentes.</p></td>
	</tr>
</table>
<?php if ($model->arma !== null) { ?>
<table width="900">
	<tr>
		<th>ESPECIFICAÇÃO</th>
		<th>Nº. SÉRIE</th>
		<th>PATRIMÔNIO</th>
		<th>SINARM</th>
		<th>OBS/ESTADO</th>
	</tr>
	<tr>
		<td><?php echo $model->arma->tipo->tipoText; ?></td>
		<td><?php echo $model->arma->num_serie; ?></td>
		<td><?php echo $model->arma->patrimonio; ?></td>
		<td><?php echo $model->arma->sinarm; ?></td>
		<td><?php echo $model->estado; ?></td>
	</tr>
	<tr>
		<td colspan="5"><?php			
			if($model->qtde_carregador!==null)
			{
				if($model->qtde_carregador>1)
					echo "Acompanha {$model->qtde_carregador} Carregadores.";
				else
					echo "Acompanha {$model->qtde_carregador} Carregador.";
			}
		?></td>
	</tr>
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
</table>
</center>
</body>
</html>
