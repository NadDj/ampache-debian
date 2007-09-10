<?php
/*

 Copyright (c) 2001 - 2007 Ampache.org
 All rights reserved.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License v2
 as published by the Free Software Foundation. 

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

*/
?>
<td colspan="5">
<form method="post" id="edit_playlist_<?php echo $playlist->id; ?>" action="#">
<table border="0" cellpadding="0" cellspacing="0">
<tr>
	<td>
	<input type="textbox" name="name" size="9" value="<?php echo scrub_out($playlist->name); ?>" />
	</td>
	<td>
	<input type="hidden" name="id" value="<?php echo $playlist->id; ?>" />
	<input type="hidden" name="type" value="playlist" />
	<?php echo Ajax::button('?action=edit_object&id=' . $playlist->id . '&type=playlist','download',_('Save Changes'),'save_playlist_' . $playlist->id,'edit_playlist_' . $playlist->id); ?>
	</td>
</tr>
</table> 
</td>