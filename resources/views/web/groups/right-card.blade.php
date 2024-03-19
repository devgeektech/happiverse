<div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">About</h4>
                            <p>{{$group->groupDescription}}</p>
                            <ul class="side-menu">
                                <li>
                                    <div class="d-flex" href="" title="Post">
                                        <i class="fas fa-lock d-none"></i>
                                        <i class="fas fa-globe-americas"></i>
                                        <div>
                                            <h4 class="card-title">{{$group->groupPrivacy}}</h4>
                                            <p>Anyone can see who's in the group and what they post.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex" href="" title="Post">
                                        <i class="fas fa-eye"></i>
                                        <i class="fas fa-eye-slash d-none"></i>
                                        <div>
                                            <h4 class="card-title">Visible</h4>
                                            <p>Anyone can find this group.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>