<?php
/* vim:set softtabstop=4 shiftwidth=4 expandtab: */
/**
 *
 * LICENSE: GNU Affero General Public License, version 3 (AGPLv3)
 * Copyright 2001 - 2015 Ampache.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

$web_path = AmpConfig::get('web_path');
?>
<?php if ($browse->get_show_header()) {
    require AmpConfig::get('prefix') . UI::find_template('list_header.inc.php');
} ?>
<table class="tabledata" cellpadding="0" cellspacing="0" data-objecttype="live_stream">
    <thead>
        <tr class="th-top">
            <th class="cel_play essential"></th>
            <th class="cel_streamname essential persist"><?php echo Ajax::text('?page=browse&action=set_sort&browse_id=' . $browse->id . '&sort=name', T_('Name'),'live_stream_sort_name'); ?></th>
            <th class="cel_streamurl optional"><?php echo T_('Stream URL'); ?></th>
            <th class="cel_codec optional"><?php echo Ajax::text('?page=browse&action=set_sort&browse_id=' . $browse->id . '&sort=codec', T_('Codec'),'live_stream_codec');  ?></th>
            <th class="cel_action essential"><?php echo T_('Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($object_ids as $radio_id) {
            $libitem = new Live_Stream($radio_id);
            $libitem->format();
            ?>
        <tr id="live_stream_<?php echo $libitem->id;
            ?>" class="<?php echo UI::flip_class();
            ?>">
            <?php require AmpConfig::get('prefix') . UI::find_template('show_live_stream_row.inc.php');
            ?>
        </tr>
        <?php 
        } //end foreach ($artists as $artist) ?>
        <?php if (!count($object_ids)) {
    ?>
        <tr>
            <td colspan="6"><span class="nodata"><?php echo T_('No live stream found');
    ?></span></td>
        </tr>
        <?php 
} ?>
    </tbody>
    <tfoot>
        <tr class="th-bottom">
            <th class="cel_play"></th>
            <th class="cel_streamname"><?php echo Ajax::text('?page=browse&action=set_sort&browse_id=' . $browse->id . '&sort=name', T_('Name'),'live_stream_sort_name'); ?></th>
            <th class="cel_streamurl"><?php echo T_('Stream URL'); ?></th>
            <th class="cel_codec"><?php echo Ajax::text('?page=browse&action=set_sort&browse_id=' . $browse->id . '&sort=codec', T_('Codec'),'live_stream_codec_bottom');  ?></th>
            <th class="cel_action"><?php echo T_('Action'); ?> </th>
        </tr>
    </tfoot>
</table>
<script src="<?php echo AmpConfig::get('web_path'); ?>/lib/javascript/tabledata.js" language="javascript" type="text/javascript"></script>
<?php if ($browse->get_show_header()) {
    require AmpConfig::get('prefix') . UI::find_template('list_header.inc.php');
} ?>
