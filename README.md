# Heleket 스타일 웹사이트

heleket.com과 유사한 암호화폐 결제 게이트웨이 웹사이트입니다.

## 프로젝트 구조

```
site/
├── index.php                 # 메인 페이지
├── includes/                 # 공통 컴포넌트
│   ├── header.php           # 헤더
│   └── footer.php           # 푸터
├── pages/                    # 서브 페이지
│   ├── cards.php            # 카드 페이지
│   ├── contacts.php         # 연락처 페이지
│   └── blog.php             # 블로그 페이지
└── assets/                   # 정적 자산
    ├── css/
    │   └── style.css        # 메인 스타일시트
    ├── js/
    │   └── main.js          # JavaScript
    └── img/                 # 이미지 (추가 필요)
```

## 주요 기능

### 메인 페이지
- Hero 섹션 - 메인 타이틀과 CTA 버튼
- 코인 목록 - 지원하는 암호화폐 표시
- 서비스 작동 방식 - 사용 방법 안내
- 장점 섹션 - 서비스의 이점
- 비즈니스 섹션 - 적용 가능한 비즈니스 유형
- 도구 섹션 - 제공하는 기능
- FAQ - 자주 묻는 질문 (아코디언)
- 연락처 양식

### 서브 페이지
- **Cards** - 암호화폐 카드 서비스 소개
- **Contacts** - 연락처 정보 및 문의 양식
- **Blog** - 블로그 게시글 목록

## 기술 스택

- **Backend**: PHP
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **디자인**: 반응형 웹 디자인

## 설치 방법

1. 웹 서버 (Apache/Nginx)와 PHP 7.4+ 설치
2. 프로젝트를 웹 루트 디렉토리에 복사
3. 웹 브라우저로 접속

## 사용 기술

- **CSS Grid & Flexbox**: 레이아웃 구성
- **반응형 디자인**: 모바일, 태블릿, 데스크톱 지원
- **PHP Include**: 컴포넌트 재사용
- **JavaScript**: FAQ 아코디언, 스무스 스크롤

## 커스터마이징

### 색상 변경
`assets/css/style.css` 파일에서 다음 색상 값을 수정하세요:
- Primary Color: `#6366f1`
- Secondary Color: `#8b5cf6`
- Text Color: `#333`
- Background: `#fff`

### 콘텐츠 수정
각 페이지의 PHP 파일에서 직접 텍스트를 수정할 수 있습니다.

## 라이선스

MIT License

## 작성자

Claude Code
