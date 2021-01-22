<?
if ($result['count'] > 3):
	?>
    <div id="controls">
        <div class="pagination">
            <a id="undo" class="pagen" href="#">«</a>
			<?
			$paginationCount = intdiv($result['count'], 3);
			for ($paginationCount, $i = 1; $paginationCount >= 0; $paginationCount--, $i++):
				if (!$result['pagen'] && $i == 1) {
					?>
                    <a class="pagen active" href="#"><?= $i ?></a>
					<?
					continue;
				}
				?>
                <a class="pagen <?= ($result['pagen'] == $i ? "active" : "") ?>" href="#"><?= $i ?></a>
			<? endfor; ?>
            <a id="undo" class="pagen">»</a>
        </div>
    </div>
<? endif; ?>

