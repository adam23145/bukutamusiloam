<div class="col-lg-2 col-md-2">
    <div class="sidebar">
        <div class="sidebar-heading">
            <span class="weight-500 font-20 block text-center txt-white">Dashboard</span>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <form method="post">
                        <button id="daftarTamuBtn" name="sidebar" value="1" class="btn btn-success btn-block"><strong>Daftar Tamu</strong></button>
                    </form>
                </li>
                <!-- Tambah menu "Data Master" -->
                <li >
                    <a href="#" id="dataMasterToggle" style="color: grey;">
                        <span class="text-center block txt-white weight-500 font-20">Data Master</span>
                    </a>
                    <ul id="dataMasterSubMenu" class="" style="margin-top: 10px;">
                        <li>
                            <form method="post">
                                <button id="daftarVendorBtn" name="sidebar" value="2" class="btn btn-success btn-block"><strong>Vendor</strong></button>
                            </form>
                        </li>
                        <li>
                            <form method="post">
                                <button id="jenisPengenalBtn" name="sidebar" value="3" class="btn btn-success btn-block"><strong>Jenis Pengenal</strong></button>
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- Akhir tambahan menu "Data Master" -->
            </ul>
        </div>
    </div>
</div>
<style>
.sidebar-heading {
    text-align: center;
    margin-bottom: 20px;
}

.sidebar-menu ul {
    list-style: none;
    padding: 0;
}

.sidebar-menu ul li {
    margin-bottom: 10px;
}

.sidebar-menu button {
    background-color: #28a745;
    color: #fff;
    padding: 10px;
    width: 100%;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.sidebar-menu button:hover {
    background-color: #218838;
}

/* Add any additional CSS styling you need */

</style>