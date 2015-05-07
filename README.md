רכיב המלצה לקריאת מאמרים נוספים
===============================

**שימו לב: זוהי גרסת אלפא במקרה הטוב!**

הרחבה זו למדיה-ויקי יוצרת ווידג'ט פשוט עם המלצות על ערכים נוספים לקריאה.

ההמלצות מתבססות על נתונים הלקוחים מתוך מערכת Google Analytics עבור את "כל-זכות".
מסד הנתונים להמלצות נבנה בצורה ידנית, ע"י הוצאת מידע ממערכת GA לגבי העמודים שמגיעים אליהם הכי הרבה מכל עמוד נתון.
הסכמה כוללת טבלה בודדת, ובה השדות הבאים: LandingPage, NextPagePath, PageViews

בכל דף, ההרחבה פונה למסד הנתונים החיצוני הנ"ל בשאילתת SQL ושולפת את הדפים הנפוצים ביותר אליהם אנשים גלשו מהדף הנוכחי.
אם לא קיימים נתונים אודות הדף הנוכחי, לא תוצג תיבת ההמלצות.

## התקנה
בדומה לכל הרחבת מדיה-ויקי, ע"י הורדת הקבצים לתיקית extensions/WikiRights בתוך ספריית ההתקנה של מדיה-ויקי
והוספת הפקודה הבאה ל-LocalSettings.php:
	require_once ( "$IP/extensions/WikiRights/RecommendationEngine/RecommendationEngine.php" );
	
### הגדרות

    $wgRecoEngineDB = array(
        'server' => 'שרת מסד הנתונים להמלצות',
        'name' => 'שם מסד הנתונים',
        'user' => 'משתמש לגישה למסד הנתונים',
        'password' => 'סיסמה המשתמש'
    );


## הוראות שימוש
על מנת להפעיל את ההרחבה בדף מסוים, יש להוסיף בו את הפקודה "{{#המלצות:}}" (או "{{#recommendations:}}") במיקום הרצוי.
שיטה טובה לכך היא לשלב את הפקודה בתבנית נוספת הנוכחת בדפים - באתר כל-זכות, לדוגמה, ניתן לשלב אותה מיד לאחר התקציר
באמצעות [[תבנית:עצם העניין/סיום]]. 
צילומסך לדוגמה: ראו screenshot.png

## קרדיטים
רכיב זה פותח ע"י סיילספורס.קום ישראל (Salesforce.com Israel) במהלך האקתון כל-זכות, דצמבר 2014.
התאמה בסיסית למבנה הרחבת MediaWiki ע"י דרור, כל-זכות.

## רשיון
הרחבה זו זמינה תחת רשיון GNU-GPL גרסה 2 ואילך. הרשיון עצמו מופיע בקובץ COPYING המצורף.
