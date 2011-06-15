## API 文件

COSCUP 2011 網站提供下列**唯讀**JSON-P API 供第三方程式取用。因為具有 JSON-P 的能力，您可以用在 client 端網路應用程式；在引用時加上 `callback` 參數即可。

有任何關於 API 的建議與問題請洽 <timdream@gmail.com> 。

### 導覽選單 (`menu`)

* URL: `http://coscup.org/2011/api/menu/`。[縮排顯示](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/menu/)。

提供三種語言的網站導覽選單 HTML，設計給 `coscup.org` 的子網站使用。超連結（`href`）沒有 hostname，只有絕對路徑。取用這些頁面的網站通常是 `coscup.org`，除非您想要測試 IPv6 連線（改用 `ipv6.coscup.org`）。

### 提到 COSCUP 的噗 (`plurk`)

* URL: `http://coscup.org/2011/api/plurk/`。[縮排顯示](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/plurk/)。

只是個 `http://www.plurk.com/API/PlurkSearch/search?query=COSCUP` 的 Proxy。資料結構請參考 [Plurk API 1.0 文件](http://www.plurk.com/API#search)。搜尋詞彙是寫死的，且更新速率限制在 10 分鐘以上。如果需要即時的資訊請自己申請 API key 直接存取噗浪。

**註**: 這個 URL 不支援 JSON-P，改用在 HTTP 標頭加上 `Access-Control-Allow-Origin: *` 的方式來實作跨來源資源共享 (Cross-Origin Resource Sharing)。 `callback` 參數在這個 URL 沒有作用。

### 議程 (`program`)

* URL: `http://coscup.org/2011/api/program/`。[縮排顯示](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/program/)。

大約 ~50KB 大的 JSON 文件，列出 COSCUP 2011 的所有議程。可能的話，應用程式**應**留存此資料的快取（網路應用程式可以使用`localStorage`；[參考資料](http://diveintohtml5.org/storage.html)）。議程*可能*是照時間順序排列，但是不一定；程式**應**具有處理不照時間排列的資料的能力。另外，議程更新的時候講次在列表上的順序可能會改變；程式**不應**使用順序來辨識講次。

**注意**: 議程 API 目前提供來自 [COSCUP 2010](http://coscup.org/2010/) 的測試內容。會在 2011 年議程公布數天前移除更新。

### 議程主題與類型 (`program/types`)

* URL: `http://coscup.org/2011/api/program/types/`。[縮排顯示](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/program/types/)。

COSCUP 2011 的主題列表，被議程的 `type` 參數引用。注意 `id = 0` 代表**一般議程**，像是開幕、閉幕、休息等等。

主題資訊應該不會隨著時間改變。

### 會場會議廳 (`program/rooms`)

* URL: `http://coscup.org/2011/api/program/rooms/`。[縮排顯示](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/program/rooms/)。

COSCUP 2011 會場各會議廳的名字，被議程的 `room` 參數引用。`id = 0` 代表 Keynote 與連播議程。

這個資訊應該不會隨時間改變。

### 贊助單位 (`sponsors`)

* URL: `http://coscup.org/2011/api/sponsors/`。[縮排顯示](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/sponsors/)。

COSCUP 2011 的贊助商資訊。程式**應**內建各贊助等級的順序，各等級內的贊助單位順序在列出時**應**保存；在只能顯示一個贊助單位的場合，要顯示哪個贊助單位的機制必須使用加權隨機的方式挑選，加權比率如下：

> diamond:gold:silver:bronze:media = 10:5:2:1:0

此演算法的  Javascript 版本在 COSCUP 2011 手機版網頁有實作，您可以參考[此處](http://coscup.org/2011-theme/assets/script.js)位於 `mobileSponsorLogo()` 的程式碼。

程式至少需每日更新贊助單位資訊。
