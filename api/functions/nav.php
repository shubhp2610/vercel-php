<?php
function navbar(){
    echo '<!--
    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    Design And Developed by >> SHUBH PATEL
    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    --><nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link active" style="padding:20px" href="/pages/report/">
                <div class="sb-nav-link-icon"><i class="fas fa-vial"></i></div>
                Reports
            </a>
            <a class="nav-link active" style="padding:20px" href="/pages/patient/">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Patients
            </a>
        </div>
        </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Sanjay Patel
    </div>
</nav>';
}

?>