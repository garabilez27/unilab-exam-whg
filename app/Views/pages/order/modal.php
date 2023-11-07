
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="Add Modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder text-primary text-gradient">Search Item</h3>
          </div>
          <div class="card-body pb-3">
            <form role="form text-left">
              <label>Name</label>
              <select class="form-select mb-3" id="itemSearch" name="name" onchange="searchItem(this.value)">
                <option value="">Select Item</option>
                <?php foreach($skus as $sku => $value): ?>
                  <option value="<?= $value['id'] ?>" <?= old('name') == $value['id'] ? 'selected' : '' ?>><?= $value['name'] ?></option>
                <?php endforeach; ?>
              </select>
              <label>Price</label>
              <div class="input-group mb-3">
                <input type="number" name="price" id="price" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="price-addon" value="<?= old('price') ?>" readonly>
              </div>
              <label>Quantity</label>
              <div class="input-group mb-3">
                <input type="number" minlength="1" maxlength="10" name="quantity" id="quantity" class="form-control" placeholder="Quantity" aria-label="Quantity" aria-describedby="quantity-addon" value="<?= old('quantity') ?>" onchange="calculate()">
              </div>
              <label>Total Amount</label>
              <div class="input-group mb-3">
                <input type="number" name="tamount" id="tamount" class="form-control" placeholder="Total Amount" aria-label="Total Amount" aria-describedby="tamount-addon" value="<?= old('tamount') ?>" readonly>
              </div>
              <div class="text-center">
                <button type="button" onclick="add()" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0" id="add1">Add</button>
                <button type="button" onclick="edit()" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0 d-none" id="edit1">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
