<?php
/**
 * To add items, you need to add a new block to this, just copy another.
 * The format is:
 *
 * [
 *  'name'   => 'The name of the item, it does not need to be exact, its for your reference',
 *  'id'     => 'The exact ID, use the pastebin link to find the ID',
 *  'buy'    => 'how much you want to buy the item for, it will buy any under that price',
 *  'sell'   => 'how much you want to sell the item for',
 *  'amount => 'The amount to buy before it sells in 1 big stack. Put 0 to not sell',
 * ],
 *
 * THE COMMAS ARE IMPORTANT, COPY OTHER EXAMPLES
 *
 * ------------------------------------------------------------
 *
 * Getting item ids:
 *
 * - Open this pastebin link: https://pastebin.com/raw/D4pSKvA6
 * - Do a browser search: CTRL+F and type name of your item
 * - Above the name will be a random bunch of numbers/letters, eg: 5672cb124bdc2d1a0f8b4568
 * - That random shit is your ID, copy it exactly
 *
 *
 *
 * Commands can be added with 2 slashes,
 * eg: // this is my snipe buy list.
 *
 * ------------------------------------------------------------
 *
 * Todo
 * - Test out buying shit over 500k, might need multiple stacks send to buy request
 * - Add colors
 *
 */

return [
    [
        'name'      => 'AA Battery',
        'id'        => '5672cb124bdc2d1a0f8b4568',
        'buy'       => 1300,
        'sell'      => 3200,
        'undercut'  => 10,
        'amount'    => 5,
    ],
    [
        'name'      => 'IFAK',
        'id'        => '590c678286f77426c9660122',
        'buy'       => 1500,
        'sell'      => 2500,
        'undercut'  => 100,
        'amount'    => 5,
    ],
    [
        'name'      => 'Golden Star Balm',
        'id'        => '5751a89d24597722aa0e8db0',
        'buy'       => 22000,
        'sell'      => 30000,
        'undercut'  => 350,
        'amount'    => 1
    ],
    [
        'name'      => 'Injector',
        'id'        => '5c10c8fd86f7743d7d706df3',
        'buy'       => 10000,
        'sell'      => 15000,
        'undercut'  => 350,
        'amount'    => 1
    ],
    [
        'name'      => 'Matches',
        'id'        => '57347b8b24597737dd42e192',
        'buy'       => 1300,
        'sell'      => 3200,
        'amount'    => 10,
    ],
    [
        'name'     => 'Wires',
        'id'       => '5c06779c86f77426e00dd782',
        'buy'      => 7200,
        'sell'     => 9825,
        'undercut' => 100,
        'amount'   => 5,
    ],
    [
        'name'     => 'Bolts',
        'id'       => '57347c5b245977448d35f6e1',
        'buy'      => 9000,
        'sell'     => 11425,
        'undercut' => 100,
        'amount'   => 5
    ],
    [
        'name'     => 'A pack of nails',
        'id'       => '590c31c586f774245e3141b2',
        'buy'      => 32500,
        'sell'     => 40000,
        'undercut' => 250,
        'amount'   => 5,
    ],
    [
        'name'     => 'Physical Bitcoins',
        'id'       => '59faff1d86f7746c51718c9c',
        'buy'      => 50000,
        'sell'     => 152000,
        'amount'   => 5,
    ],
    [
        'name'     => 'Graphics Card',
        'id'       => '57347ca924597744596b4e71',
        'buy'      => 270000,
        'sell'     => 315000,
        'undercut' => 1000,
        'amount'   => 1,
    ],
    [
        'name'     => 'Paracord',
        'id'       => '5c12688486f77426843c7d32',
        'buy'      => 150000,
        'sell'     => 180000,
        'undercut' => 500,
        'amount'   => 1,
    ],
    [
        'name'     => 'Analog Thermometer',
        'id'       => '5d1b32c186f774252167a530',
        'buy'      => 30000,
        'sell'     => 52500,
        'undercut' => 500,
        'amount'   => 1
    ],
    [
        'name'     => 'Corrugated Hose',
        'id'       => '59e35cbb86f7741778269d83',
        'buy'      => 22000,
        'sell'     => 27000,
        'undercut' => 200,
        'amount'   => 1,
    ],
    [
        'name'     => 'Pressure Gauge',
        'id'       => '5d1b327086f7742525194449',
        'buy'      => 30000,
        'sell'     => 65000,
        'undercut' => 500,
        'amount'   => 1,
    ],
    [
        'name'     => 'Tetris',
        'id'       => '5c12620d86f7743f8b198b72',
        'buy'      => 102000,
        'sell'     => 135000,
        'undercut' => 1500,
        'amount'   => 1,
    ],
    [
        'name'     => 'Dry Fuel',
        'id'       => '590a373286f774287540368b',
        'buy'      => 30000,
        'sell'     => 55000,
        'undercut' => 1000,
        'amount'   => 1,
    ],
    [
        'name'     => 'Disposable Syringe',
        'id'       => '5d1b3f2d86f774253763b735',
        'buy'      => 20000,
        'sell'     => 35000,
        'undercut' => 1000,
        'amount'   => 1,
    ],
    [
        'name'     => 'Trijicon Reap-IR Thermal Scope',
        'id'       => '5a1eaa87fcdbcb001865f75e',
        'buy'      => 120000,
        'sell'     => 180000,
        'undercut' => 2000,
        'amount'   => 1,
    ],
    [
        'name'     => 'Sugar',
        'id'       => '59e3577886f774176a362503',
        'buy'      => 15000,
        'sell'     => 30000,
        'undercut' => 500,
        'amount'   => 1
    ],
    [
        'name' 		=> 'Magazine Case',
        'id' 		=> '5c127c4486f7745625356c13',
        'buy' 		=> 150000,
        'sell' 		=> 310000,
        'undercut' 	=> 1250,
        'amount' 	=> 1
    ],
    [
        'name' 		=> 'Small S I C C Case',
        'id' 		=> '5d235bb686f77443f4331278',
        'buy' 		=> 400000,
        'sell' 		=> 3100000,
        'undercut' 	=> 10000,
        'amount' 	=> 1
    ],
    [
        'name' 		=> 'Items Case',
        'id' 		=> '59fb042886f7746c5005a7b2',
        'buy' 		=> 250000,
        'sell' 		=> 1850000,
        'undercut' 	=> 5000,
        'amount' 	=> 1
    ],
    [
        'name' 		=> 'Weapon Case',
        'id' 		=> '59fb023c86f7746d0d4b423c',
        'buy' 		=> 250000,
        'sell' 		=> 1250000,
        'undercut' 	=> 5000,
        'amount' 	=> 1
    ],
    [
        'name' 		=> 'Gunpowder Kite',
        'id' 		=> '590c5a7286f7747884343aea',
        'buy' 		=> 2500,
        'sell' 		=> 6000,
        'undercut' 	=> 250,
        'amount' 	=> 1
    ],
    [
        'name' 		=> 'Gunpowder Eagle',
        'id' 		=> '5d6fc78386f77449d825f9dc',
        'buy' 		=> 30000,
        'sell' 		=> 55000,
        'undercut' 	=> 850,
        'amount' 	=> 1
    ],
    [
        'name' 		=> 'Gunpowder hawk',
        'id' 		=> '5d6fc87386f77449db3db94e',
        'buy' 		=> 16000,
        'sell' 		=> 28000,
        'undercut' 	=> 650,
        'amount' 	=> 1
    ],
    [
        'name' 		=> 'M67 Grenadek',
        'id' 		=> '58d3db5386f77426186285a0',
        'buy' 		=> 5000,
        'sell' 		=> 10000,
        'undercut' 	=> 500,
        'amount' 	=> 4
    ],
    [
        'name' 		=> 'Gas Analyser',
        'id' 		=> '590a3efd86f77437d351a25b',
        'buy' 		=> 10000,
        'sell' 		=> 12000,
        'undercut' 	=> 300,
        'amount' 	=> 1
    ],
    [
        'name'      => 'Tank Battery',
        'id'	    => '5d03794386f77420415576f5',
        'buy'	    => 50000,
        'sell'	    => 220000,
        'undercut'  => 3500,
        'amount'    => 1
    ],
    [
        'name'	    => 'Silver Badge',
        'id'	    => '5bc9bdb8d4351e003562b8a1',
        'buy'	    => 20000,
        'sell'		=> 40000,
        'undercut'  => 1000,
        'amount'    => 1,
    ],
    [
        'name'	    => 'Gold Chain',
        'id'		=> '5734758f24597738025ee253',
        'buy'		=> 5000,
        'sell'	    => 22000,
        'undercut'  => 400,
        'amount'	=> 1,
    ],
    [
        'name'		=> 'Roler Watch',
        'id'		=> '59faf7ca86f7740dbe19f6c2',
        'buy'		=> 20000,
        'sell'		=> 40000,
        'undercut'  => 2500,
        'amount'	=> 1
    ],

    // Keycards
    [
        'name'     => 'Black Key Card',
        'id'       => '5c1d0f4986f7744bb01837fa',
        'buy'      => 100000,
        'sell'     => 0,
        'amount'   => 0,
    ],
    [
        'name'     => 'Blue Key Card',
        'id'       => '5c1d0c5f86f7744bb2683cf0',
        'buy'      => 400000,
        'sell'     => 0,
        'amount'   => 0,
    ],
    [
        'name'     => 'Green Key Card',
        'id'       => '5c1d0dc586f7744baf2e7b79',
        'buy'      => 200000,
        'sell'     => 0,
        'amount'   => 0,
    ],
    [
        'name'     => 'Red Key Card',
        'id'       => '5c1d0efb86f7744baf2e7b7b',
        'buy'      => 500000,
        'sell'     => 0,
        'amount'   => 0,
    ],
    [
        'name'     => 'Violet Key Card',
        'id'       => '5c1e495a86f7743109743dfb',
        'buy'      => 450000,
        'sell'     => 0,
        'amount'   => 0,
    ],
];
