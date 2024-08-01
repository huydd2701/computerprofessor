<style>
.nav-button:nth-of-type(1) ~ #nav-content-highlight{
    top: 16px;
}

:root {
  --select-border: #777;
  --select-focus: blue;
  --select-arrow: var(--select-border);
}

select {
  // A reset of styles, including removing the default dropdown arrow
  appearance: none;
  background-color: transparent;
  border: none;
  padding: 0 1em 0 0;
  margin: 0;
  width: 100%;
  font-family: inherit;
  font-size: inherit;
  cursor: inherit;
  line-height: inherit;
  z-index: 1;
  &::-ms-expand {
    display: none;
  }
  outline: none;
}

.select {
  display: grid;
  grid-template-areas: "select";
  align-items: center;
  position: relative;
  select,
  &::after {
    grid-area: select;
  }
  min-width: 15ch;
  max-width: 25ch;
  border: 1px solid var(--select-border);
  border-radius: 0.25em;
  padding: 0.25em 0.5em;
  font-size: 1.2rem;
  cursor: pointer;
  line-height: 1;
  background-color: #fff;
  background-image: linear-gradient(to top, #f9f9f9, #fff 33%);
}
</style>
<p style="font-size: 18px;">Thống kê đơn hàng theo : <span id="text-date"></span></p>
<p>
<div class="select">
	<select class="select-date">
		<option value="7ngay">7 ngày qua</option>
		<option value="28ngay">28 ngày qua</option>
		<option value="90ngay">90 ngày qua</option>
		<option value="365ngay">365 ngày qua</option>
	</select>
</div>
</p>
<div id="chart" style="height: 420px;width: 1200px;"></div>
