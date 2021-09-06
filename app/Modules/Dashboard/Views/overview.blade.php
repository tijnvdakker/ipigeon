@extends('layout.main')
@section('content')
        <div class="page-header">
                <div>
                    <h1>Analytics Dashboard</h1>
                    <small>Monitor key metrics. Check reporting and review insights</small>
                </div>
                <div class="header-actions">
                    <button>
                        <span class="las la-file-export"></span>
                        Export
                    </button>
                    <button>
                        <span class="las la-tools"></span>
                        Settings
                    </button>
                </div>
            </div>

            <div class="cards">
                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Reservations</span>
                                <small>Number of approved reservations</small>
                            </div>
                            <h2>{{count($reservations)}}</h2>

                            <small>Excluding pending</small>
                        </div>
                        <div class="card-chart pink">
                            <span class="las la-calendar"></span>
                        </div>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Orders</span>
                                <small>Number of pending orders</small>
                            </div>
                            <h2>{{count($orders)}}</h2>

                            <small>Excluding fulfilled</small>
                        </div>
                        <div class="card-chart blue">
                            <span class="las la-clipboard-list"></span>
                        </div>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Employees</span>
                                <small>Number of active employees</small>
                            </div>
                            <h2>{{ count($active_employees) }}</h2>

                            <small>Change status in overview</small>
                        </div>
                        <div class="card-chart green">
                            <span class="las la-users"></span>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="jobs-grid">
                <div class="analytics-card">
                    <div class="analytics-head">
                        <h3>Actions needed</h3>
                        <span class="las la-ellipsis-h"></span>
                    </div>

                    <div class="analytics-chart">
                        <div class="chart-circle">
                            <h1>74%</h1>
                        </div>

                        <div class="analytics-note">
                            <small>Note: Current sprint requires stakeholders meeting to reach conclusion</small>
                        </div>
                    </div>

                    <div class="analytics-btn">
                        <button>Generate report </button>
                    </div>
                </div>
                <div class="jobs">
                    <h2>Jobs 
                        <small>See all jobs 
                            <span class="las la-arrow-right"></span>
                        </small>
                    </h2>
                    <div class="table-responsive">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <span class="indicator"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Customer experience designer
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Design
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Copenhagen Denmark
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Posted 6 days ago
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button>8 applicants</button>
                                        </div>
                                    </td>
                                </tr>   

                                <tr>
                                    <td>
                                        <div>
                                            <span class="indicator even"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Software developer
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Development
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Copenhagen Denmark
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Posted 6 days ago
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button>8 applicants</button>
                                        </div>
                                    </td>
                                </tr>   

                                <tr>
                                    <td>
                                        <div>
                                            <span class="indicator"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Customer experience designer
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Design
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Copenhagen Denmark
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Posted 6 days ago
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button>8 applicants</button>
                                        </div>
                                    </td>
                                </tr>   

                                <tr>
                                    <td>
                                        <div>
                                            <span class="indicator even"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Software developer
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Development
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Copenhagen Denmark
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Posted 6 days ago
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button>8 applicants</button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div>
                                            <span class="indicator"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Customer experience designer
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Design
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Copenhagen Denmark
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Posted 6 days ago
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button>8 applicants</button>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
            <div class="tables-container">
                <div class="table-single">
                    <div class="tables-container-div">
                        <b>Table 1</b>
                        <span class="las la-clipboard-check"></span>
                    </div>
                    <div class="tables-container-div">
                        <span>Empty</span>
                    </div>
                </div>
                <div class="table-single">
                    <div class="tables-container-div">
                        <b>Table 1</b>
                        <span class="las la-clipboard-check"></span>
                    </div>
                    <div class="tables-container-div">
                        <span>Tijn van den Akker Tijn van den Akker Tijn van den Akker</span>
                    </div>
                </div>
                <div class="table-single">
                    <div class="tables-container-div">
                        <b>Table 1</b>
                    </div>
                </div>
                <div class="table-single">
                    <div class="tables-container-div">
                        <b>Table 1</b>
                    </div>
                </div>
                <div class="table-single">
                    <div class="tables-container-div">
                        <span>Table 1</span>
                    </div>
                </div>
                <div class="table-single">
                    <div class="tables-container-div">
                        <span>Table 1</span>
                    </div>
                </div>
                <div class="table-single">
                    <div class="tables-container-div">
                        <span>Table 1</span>
                    </div>
                </div>
                <div class="table-single">
                    <div class="tables-container-div">
                        <span>Table 1</span>
                    </div>
                </div>
            </div>

            
@endsection
