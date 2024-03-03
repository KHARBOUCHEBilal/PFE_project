<div class="modal fade" id="students-modal" tabindex="-1" role="dialog" aria-labelledby="students-modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content product-modal">
            <div class="close" type="button" data-dismiss="modal"><a href="">X</a>
            </div>
            <div class="modal-carte-content last-add-product-model">
                <form action="{{ route('students.dashboard_update') }}" method="POST" class="form">
                    @csrf
                    <input type="text" name="from_auth" value="true" hidden readonly>

                    <div class="radio"><input type="radio" name="status" value="inactivated"><span>Desactivé</span>
                    </div>

                    <div class="radio"><input type="radio" name="status"
                            value="activated"><span>Activaté</span>
                    </div>
                    <div class="radio"><input type="radio" name="status"
                            value="programmed"><span>Programer</span>
                    </div>
                    Starts At
                    <div class="date">
                        <input type="date" name="starts_at_date">
                        <input type="time" name="starts_at_time">
                    </div>
                    Ends At
                    <div class="date">
                        <input type="date" name="ends_at_date">
                        <input type="time" name="ends_at_time">
                    </div>
                    <div class="validate">
                        <button type="submit"
                            class="suivant">{{ __('pages/visitor/pages/add-product/add-product-info.validate') }}
                            <i class="fa-solid fa-angle-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="teachers-modal" tabindex="-1" role="dialog" aria-labelledby="teachers-modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content product-modal">
            <div class="close" type="button" data-dismiss="modal"><a href="">X</a>
            </div>
            <div class="modal-carte-content last-add-product-model">
                <form action="{{ route('teachers.dashboard_update') }}" method="POST" class="form">
                    @csrf
                    <input type="text" name="from_auth" value="true" hidden readonly>

                    <div class="radio"><input type="radio" name="status" value="inactivated"><span>Desactivé</span>
                    </div>
                    <div class="radio"><input type="radio" name="status"
                            value="activated"><span>Activaté</span>
                    </div>
                    <div class="radio"><input type="radio" name="status"
                            value="programmed"><span>Programer</span>
                    </div>
                    Starts At
                    <div class="date">
                        <input type="date" name="starts_at_date">
                        <input type="time" name="starts_at_time">
                    </div>
                    Ends At
                    <div class="date">
                        <input type="date" name="ends_at_date">
                        <input type="time" name="ends_at_time">
                    </div>

                    <div class="validate">
                        <button type="submit"
                            class="suivant">{{ __('pages/visitor/pages/add-product/add-product-info.validate') }}
                            <i class="fa-solid fa-angle-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
