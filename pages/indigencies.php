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
            <div class="card-header bg-info">
                <h6 class="card-text h4 text-light">
                    Certificate of Indigency
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr class="table-sm text-center">
                                <th>First name</th>
                                <th>Middle name</th>
                                <th>Last name</th>
                                <th>Age</th>
                                <th>Civil Status</th>
                                <th>Gender</th>
                                <th>Zone#</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $resident = $DB->query("SELECT * FROM resident ORDER BY residentLName ASC");
                                foreach ($resident as $residents) : ?>
                                    <tr class="table-sm overflow-auto">
                                        <td class="text-center"><?=$residents["residentFName"] ?></td>
                                        <td class="text-center"><?=$residents["residentMName"] ?></td>
                                        <td class="text-center"><?=$residents["residentLName"] ?></td>
                                        <td class="text-center"><?=$residents["residentAge"] ?></td>
                                        <td class="text-center"><?=$residents["residentCivilStatus"] ?></td>
                                        <td class="text-center"><?=$residents["residentGender"] ?></td>
                                        <td class="text-center"><?=$residents["residentZoneNumber"] ?></td>
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