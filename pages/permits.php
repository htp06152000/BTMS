<div class="row py-3">
    <form method="POST" class="col-lg-4">
        <div class="form-group">
            <div class="input-group animate__animated animate__slideInDown animate__faster">
                <input type="search" name="s" id="search" class="form-control rounded-50px" placeholder="Search" />
                <div class="input-group-append">
                    <button type="submit" class="input-group-text rounded-50px bg-primary text-white px-3">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="row py-3">
    <div class="col-12">
        <div class="card rounded-10px" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="card-header bg-primary">
                <h6 class="card-text h4 text-light">
                    Certificate of Indigency
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr class="table-sm text-center">
                                <th>Transaction ID</th>
                                <th>Requestor</th>
                                <th>Business Type</th>
                                <th>Business Name</th>
                                <th>Business Address</th>
                                <th>Pick Up Date</th>
                                <th>Date Recorded</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $transaction = $DB->query("SELECT concat(rs.residentFName,' ',rs.residentMName,' ',rs.residentLName) AS requester, tr.*, s.services AS tod FROM transaction tr JOIN resident rs ON tr.residentID = rs.residentID JOIN services s ON tr.servicesID = s.servicesID ORDER BY dateRecorded ASC");
                                foreach ($transaction as $transactions) : ?>                      
                                    <tr class="table-sm">
                                        <td class="text-center"><?=$transactions["transactionID"]?></td>
                                        <td class="text-center"><?=$transactions["requester"]?></td>
                                        <td class="text-center"><?=$transactions["type_of_business"] ?></td>
                                        <td class="text-center"><?=$transactions["business_name"] ?></td>
                                        <td class="text-center"><?=$transactions["business_address"] ?></td>
                                        <td class="text-center"><?=$transactions["pickupdate"] ?></td>
                                        <td class="text-center"><?=$transactions["dateRecorded"] ?></td>
                                        <td class="text-center font-weight-bold text-center"><?=$transactions["status"] ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-success w-100" ><i class="fi fi-rr-print"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>