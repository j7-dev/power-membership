# Power Membership | 讓每個人都可以輕鬆建立會員制網站👌
一句話講完 Power Membership :

> Power Membership 可以設定會員升級需要的累積消費門檻，並針對特定會員等級發放優惠，也改善介面，可輕鬆查看會員的消費總覽。

<br><br><br>

## ⚡ 主要功能

#### 1. 所有用戶消費數據一覽無遺

使用者列表頁面 新增用戶的消費數據欄位 & 會員等級欄位

⚠ 會員消費數據並非即時，為了性能優化有做 `transient` 快取，快取時間為 24 小時

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/71bcf616-e497-4d64-b017-2067e3f245da)


會員等級篩選器 & 顯示會員等級的使用者有多少數量

⚠ 會員等級的使用者數量並非即時，為了性能優化有做 `transient` 快取，快取時間為 24 小時

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/4c4c58da-d2a4-4830-8af2-ab83ac66a2dc)



#### 2. 更簡潔的會員頁面

揮別預設的 WordPress 會員介面

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/021542b2-8968-40f1-a4f5-5f36050719e7)

此套件依賴 Gamipress 套件，如果你希望使用 Gamipress 的其他功能，可以關閉 `簡易後台` 選項

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/84d85bb5-9516-4dd5-baf7-169089a87a6b)



#### 3. 累積消費滿額自動升級會員等級

在 `會員等級` 頁面，可以設定用戶需要 `累積消費` 到多少金額才可以升級到這個等級

升級判斷邏輯是，當該用戶訂單變為 `已完成` 、 `處理中` 時會觸發判斷

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/58ae1b7a-fd1b-4079-b204-ff1a246c15aa)



#### 4. 針對特定會員等級發放折價券

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/2e55581d-032d-42b6-968d-f92fe29e5d20)


![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/c575cd1c-5494-4d22-8a34-5da58b336c17)

#### 5. 可以設定首次購買優惠

功能:
 - 用戶必須登入，且為首次購買
 - 可與其他優惠一起使用

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/fc51e958-cd32-4570-bf36-b239cfc92834)


#### 6. 可以設定購買數量限制

功能:
 - 可以實現 `滿XX件打XX折` 的優惠
 - 可與其他條件並行，ex 滿 3 件，消費 500元 以上打9折
 - 🚩 限制購買 N 件特定商品功能尚未實現，如果你與 限制商品一起使用，條件會是 "只要購物車含有該特定商品，且總件數達標" 就可以使用優惠

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/c429eb76-40e9-4482-bc16-8cbac72739cb)




#### 7. 結帳頁折價券優化

1. 會自動顯示可用的折價券，折價金額由大排到小
2. 如果有多筆可用的折價券，只會顯示一筆最大的折價券
3. 會顯示後續等級的折價券，讓用戶知道下個等級還差多少金額可以升級，條件金額由小排到大

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/852d70a2-9e07-453b-a955-90e6f16e0371)

後台自訂選項
1. 只顯示一張最大張的折價券 - 關閉後，checkout 頁面將顯示所有 "可用" 的折價券
2. 顯示更高消費門檻的折價券 - 關閉後，checkout 頁面將隱藏所有 "不可用" 的折價券

![image](https://github.com/j7-dev/wp-power-membership/assets/9213776/ef950608-0c63-4c07-a624-ba7a4b581f37)




<br><br><br>

 ## 🐞 Bug 回報

請至 [ISSUE](https://github.com/j7-dev/wp-power-membership/issues) 描述遭遇的問題，並幫我付上外掛還有 WP 版本資訊

有建議功能的話也可以開 ISSUE

<br><br><br>

## 🗺️ 開發 RoadMap

🔲 後台、註冊 新增生日欄位

🔲 後台可以決定訂單什麼狀態才判斷

🔲 讓用戶決定快取的時間

🔲 handle coupon 的 js 還要整理

🔲 tailwindcss 打包後重新 enqueue

🔲 直接用 sql 計算業績，並保存在用戶身上

🔲 My Account 新增會員等級頁

🔲 累積消費金額的時限

🔲 批次調整會員等級

🔲 移除員等級 前端頁面


<br><br><br>


 ## 💻 依賴套件
1. [Gamipress](https://tw.wordpress.org/plugins/gamipress/)
2. [WooCommerce](https://tw.wordpress.org/plugins/woocommerce/)
3. [WP-Toolkit](https://github.com/j7-dev/wp-toolkit)


<br><br><br>




## ⬇️ 安裝方式

請至 release 下載安裝檔案，之後如同一般 WordPress 套件安裝即可
