		<select id="monthsDropdown" onchange="refresh_yarc_table()">
			<?php foreach($months as $key => $value): ?>
				<?php if(($key = $key+1) == (int)$thisMonth): ?>
					<option value=<?= $key; ?> selected><?= $value; ?></option>
				<?php else: ?>
					<option value=<?= $key; ?>><?= $value; ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
		<select id="yearsDropdown" onchange="refresh_yarc_table()">
			<?php for($i = $lastYear; $i >= $firstYear; $i--): ?>
				<?php if($i == (int)$thisYear): ?>
					<option value=<?= $i; ?> selected><?= $i; ?></option>
				<?php else: ?>
					<option value=<?= $i; ?>><?= $i; ?></option>
				<?php endif; ?>
			<?php endfor; ?>
		</select>
		<table id = "yarc-table" cellspacing = 0>
			<tr>
				<?php foreach($weekDays as $day): ?>
					<th><?= $day ?></th>
				<?php endforeach; ?>
			</tr>
			<?php for($j = 1; $j < count($weekDays); $j++): ?>
				<tr>
					<?php for($i = 0; $i < count($weekDays); $i++): ?>
						<td> </td>
					<?php endfor; ?>
				</tr>
			<?php endfor; ?>
		</table>
