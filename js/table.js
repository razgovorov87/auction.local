$('#lots').Tabledit({
    url: '../includes/lots.php',
    restoreButton: false,
    columns: {
        identifier: [0, 'id'],
        editable: [
        [1, 'num'],
        [2, 'item', $select_item_data],
        [3, 'start_date'],
        [4, 'start_price'],
        [5, 'final_price'],
        [6, 'seller', $select_peoples_data],
        [7, 'buyer', $select_peoples_data],
        [8, 'auction', $select_auction_data],
        [9, 'status', $select_status_data]
        ]
    },
    buttons: {
        edit: {
            class: 'btn btn-sm btn-primary',
            html: '<span><i class="fas fa-edit"></i></span>',
            action: 'edit'
        },
        delete: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-trash"></i></span>',
            action: 'delete'
        },
        save: {
            class: 'btn btn-sm btn-success',
            html: '<span><i class="fas fa-check"></i></span>'
        },
        restore: {
            class: 'btn btn-sm btn-warning',
            html: 'Restore',
            action: 'restore'
        },
        confirm: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-check"></i></span>'
        }
    },
    onDraw: function() {
        console.log('onDraw()');
    },
    onSuccess: function(data, textStatus, jqXHR) {
        console.log('onSuccess(data, textStatus, jqXHR)');
        console.log(data);
        console.log(textStatus);
        console.log(jqXHR);
    },
    onFail: function(jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    },
    onAlways: function() {
        console.log('onAlways()');
    },
    onAjax: function(action, serialize) {
        console.log('onAjax(action, serialize)');
        console.log(action);
        console.log(serialize);
    }
});

$('#auctions').Tabledit({
    url: '../includes/auctions.php',
    restoreButton: false,
    columns: {
        identifier: [0, 'id'],
        editable: [
        [1, 'title'],
        [2, 'start_date'],
        [3, 'specification', $select_spec_data]
        ]
    },
    buttons: {
        edit: {
            class: 'btn btn-sm btn-primary',
            html: '<span><i class="fas fa-edit"></i></span>',
            action: 'edit'
        },
        delete: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-trash"></i></span>',
            action: 'delete'
        },
        save: {
            class: 'btn btn-sm btn-success',
            html: '<span><i class="fas fa-check"></i></span>'
        },
        restore: {
            class: 'btn btn-sm btn-warning',
            html: 'Restore',
            action: 'restore'
        },
        confirm: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-check"></i></span>'
        }
    }
});

$('#tableitems').Tabledit({
    url: '../includes/items.php',
    restoreButton: false,
    columns: {
        identifier: [0, 'id'],
        editable: [
        [1, 'title'],
        [2, 'desc'],
        ]
    },
    buttons: {
        edit: {
            class: 'btn btn-sm btn-primary',
            html: '<span><i class="fas fa-edit"></i></span>',
            action: 'edit'
        },
        delete: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-trash"></i></span>',
            action: 'delete'
        },
        save: {
            class: 'btn btn-sm btn-success',
            html: '<span><i class="fas fa-check"></i></span>'
        },
        restore: {
            class: 'btn btn-sm btn-warning',
            html: 'Restore',
            action: 'restore'
        },
        confirm: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-check"></i></span>'
        }
    }
});

$('#tablespecification').Tabledit({
    url: '../includes/specification.php',
    restoreButton: false,
    columns: {
        identifier: [0, 'id'],
        editable: [
        [1, 'title']
        ]
    },
    buttons: {
        edit: {
            class: 'btn btn-sm btn-primary',
            html: '<span><i class="fas fa-edit"></i></span>',
            action: 'edit'
        },
        delete: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-trash"></i></span>',
            action: 'delete'
        },
        save: {
            class: 'btn btn-sm btn-success',
            html: '<span><i class="fas fa-check"></i></span>'
        },
        restore: {
            class: 'btn btn-sm btn-warning',
            html: 'Restore',
            action: 'restore'
        },
        confirm: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-check"></i></span>'
        }
    }
});

$('#tablestatus').Tabledit({
    url: '../includes/status.php',
    restoreButton: false,
    columns: {
        identifier: [0, 'id'],
        editable: [
        [1, 'title']
        ]
    },
    buttons: {
        edit: {
            class: 'btn btn-sm btn-primary',
            html: '<span><i class="fas fa-edit"></i></span>',
            action: 'edit'
        },
        delete: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-trash"></i></span>',
            action: 'delete'
        },
        save: {
            class: 'btn btn-sm btn-success',
            html: '<span><i class="fas fa-check"></i></span>'
        },
        restore: {
            class: 'btn btn-sm btn-warning',
            html: 'Restore',
            action: 'restore'
        },
        confirm: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-check"></i></span>'
        }
    }
});

$('#tablepeoples').Tabledit({
    url: '../includes/people.php',
    restoreButton: false,
    columns: {
        identifier: [0, 'id'],
        editable: [
        [1, 'name'],
        [2, 'surname'],
        [3, 'bday'],
        ]
    },
    buttons: {
        edit: {
            class: 'btn btn-sm btn-primary',
            html: '<span><i class="fas fa-edit"></i></span>',
            action: 'edit'
        },
        delete: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-trash"></i></span>',
            action: 'delete'
        },
        save: {
            class: 'btn btn-sm btn-success',
            html: '<span><i class="fas fa-check"></i></span>'
        },
        restore: {
            class: 'btn btn-sm btn-warning',
            html: 'Restore',
            action: 'restore'
        },
        confirm: {
            class: 'btn btn-sm btn-danger',
            html: '<span><i class="fas fa-check"></i></span>'
        }
    }
});            