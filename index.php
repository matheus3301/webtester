<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Web Tester - A useful application for tests</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">

    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <link href="./main.css" rel="stylesheet">

</head>

<style>
    @media (min-width: 768px) {
        .fixed-sidebar .app-main .app-main__outer {
            padding-left: 10rem;
            padding-right: 10rem;
        }
    }
</style>

<body>



    <div class="modal fade" id="new-project-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form onsubmit="submitForm(event,'submit-response','#new-project-modal')" id="new-project-form" action="backend/api/project.php" method="POST">
                    <div class="modal-body">
                        <div id="submit-response">
                        </div>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name of the project..." required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" class="form-control" name="image" id="image" placeholder="image url">
                        </div>
                        <div class="form-group">
                            <label for="description">Description *</label>
                            <textarea placeholder="a description of the project..." class="form-control" name="description" id="description" rows="3" required></textarea>
                        </div>
                        <small>* : required field</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>

            </div>

        </div>

        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-rocket icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>Home
                                    <div class="page-title-subheading">A quick view on the projects
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Projects</div>
                                        <div class="widget-subheading">All projects created</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>11</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Executions</div>
                                        <div class="widget-subheading">Total Test Cases Executed</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>46</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Queue</div>
                                        <div class="widget-subheading">Test Cases on the Queue</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>14</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Projects
                                    <div class="btn-actions-pane-right">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#new-project-modal">
                                            New Project
                                        </button>



                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Name</th>
                                                <th class="text-center">Test Cases</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center text-muted">#1</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">Whatsapp Web</div>
                                                                <div class="widget-subheading opacity-7">The web version of whatsapp</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">34</td>
                                                <td class="text-center">
                                                    <div class="badge badge-warning">Pending</div>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Enter</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-muted">#2</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/2.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">Facebook</div>
                                                                <div class="widget-subheading opacity-7">A social network</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">56</td>
                                                <td class="text-center">
                                                    <div class="badge badge-success">Completed</div>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" id="PopoverCustomT-2" class="btn btn-primary btn-sm">Enter</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-muted">#3</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">Twitter</div>
                                                                <div class="widget-subheading opacity-7">Another social network</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">76</td>
                                                <td class="text-center">
                                                    <div class="badge badge-danger">In Progress</div>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm">Enter</button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="./assets/scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
    <script type="text/javascript" src="./assets/scripts/requisition.js"></script>
</body>

</html>