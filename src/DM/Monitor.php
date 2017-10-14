<?php

/*
 * This file is part of Pluf Framework, a simple PHP Application Framework.
 * Copyright (C) 2010-2020 Phoinex Scholars Co. http://dpq.co.ir
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 *
 * @author maso<mostafa.barmshory@dpq.co.ir>
 * @author hadi<mohammad.hadi.mansouri@dpq.co.ir>
 * @since 0.1.0
 */
Pluf::loadFunction('DM_Shortcuts_GetAssetOr404');

class DM_Monitor
{

    /**
     * Retruns number and size of all assets
     *
     * @param unknown_type $request            
     * @param array $match            
     */
    public static function assets_size($request, $match)
    {
        $result = array(
            'interval' => 100000,
            'type' => 'scalar',
            'value' => 0
        );
        
        $assetList = new DM_Asset();
        
        $result['value'] = $assetList->getList(array(
            'view' => 'sumsize'
        ))[0]->sumsize;
        
        // $assetList->forced_where = $sql;
        // foreach ( $assetList->render_array () as $asset ) {
        // $asset = DM_Shortcuts_GetAssetOr404 ( $asset );
        // $result ['value'] += $asset->size;
        // }
        
        return $result;
    }

    /**
     * Retruns number of assets
     *
     * @param unknown_type $request            
     * @param array $match            
     */
    public static function assets_counts($request, $match)
    {
        $result = array(
            'interval' => 100000,
            'type' => 'scalar',
            'value' => 0
        );
        
        $assetList = new DM_Asset();
        
        $result['value'] = $assetList->getList(array(
            'count' => true
        ))[0]['nb_items'];
        
        return $result;
    }

    /**
     * Retruns number of all links created
     *
     * @param unknown_type $request            
     * @param array $match            
     */
    public static function link_counts($request, $match)
    {
        $result = array(
            'interval' => 100000,
            'type' => 'scalar',
            'value' => 0
        );
        
        $links = new DM_Link();
        $result['value'] = $links->getList(array(
            'count' => true
        ))[0]['nb_items'];
        
        return $result;
    }

    /**
     * Retruns top ten assets
     *
     * @param unknown_type $request            
     * @param array $match            
     */
    public static function assets_topten($request, $match)
    {
        $result = array(
            'interval' => 100000,
            'type' => 'tabular',
            'value' => 0
        );
        
        $topAssets = new DM_Asset();
        $result['value'] = $topAssets->getList(array(
            'order' => 'download DESC',
            'nb' => '10'
        ));
        
        return $result;
    }

    /**
     * Retruns recently added assets
     *
     * @param unknown_type $request            
     * @param array $match            
     */
    public static function assets_recent($request, $match)
    {
        $result = array(
            'interval' => 100000,
            'type' => 'tabular',
            'value' => 0
        );
        
        $recentAssets = new DM_Asset();
        $result['value'] = $recentAssets->getList(array(
            'order' => 'creation_dtime DESC',
            'nb' => '10'
        ));
        
        return $result;
    }
}